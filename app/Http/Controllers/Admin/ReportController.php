<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Story;
use App\Models\Comment;
use App\Models\User;
use App\Models\Writer;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ReportController extends Controller
{
    public function index()
    {
        $reports = [
            'published' => Story::where('status', 'published')->count(),
            'pending'   => Story::where('status', 'pending')->count(),
            'comments'  => Comment::count(),
        ];

        return view('admin.reports.index', compact('reports'));
    }

    public function export($type)
    {
        return match ($type) {
            'stories'  => $this->exportStories(),
            'comments' => $this->exportComments(),
            'users'    => $this->exportUsers(),
            'writers'  => $this->exportWriters(),
            default    => abort(404),
        };
    }

    /* ================= STORIES ================= */

    private function exportStories(): StreamedResponse
    {
        $stories = Story::with(['writer', 'category'])->get();

        return response()->streamDownload(function () use ($stories) {

            $handle = fopen('php://output', 'w');

            fwrite($handle, "\xEF\xBB\xBF");

            fputcsv($handle, [
                'ID',
                'العنوان',
                'الكاتب',
                'التصنيف',
                'الحالة',
                'الفئة العمرية',
                'تاريخ الإنشاء',
            ]);

            foreach ($stories as $s) {
                fputcsv($handle, [
                    $s->id,
                    $s->title,
                    $s->writer->name ?? '',
                    $s->category->name ?? '',
                    $this->statusArabic($s->status),
                    $s->age_group,
                    $s->created_at,
                ]);
            }

            fclose($handle);
        }, 'stories.csv', [
            'Content-Type' => 'text/csv; charset=UTF-8',
        ]);
    }

    /* ================= COMMENTS ================= */

    private function exportComments(): StreamedResponse
    {
        $comments = Comment::with(['user', 'story'])->get();

        return response()->streamDownload(function () use ($comments) {

            $handle = fopen('php://output', 'w');

            fwrite($handle, "\xEF\xBB\xBF");

            fputcsv($handle, [
                'ID',
                'المستخدم',
                'القصة',
                'التعليق',
                'التاريخ',
            ]);

            foreach ($comments as $c) {
                fputcsv($handle, [
                    $c->id,
                    $c->user->name ?? '',
                    $c->story->title ?? '',
                    $c->body ?? $c->comment,
                    $c->created_at,
                ]);
            }

            fclose($handle);
        }, 'comments.csv', [
            'Content-Type' => 'text/csv; charset=UTF-8',
        ]);
    }

    /* ================= USERS ================= */

    private function exportUsers(): StreamedResponse
    {
        $users = User::get();

        return response()->streamDownload(function () use ($users) {

            $handle = fopen('php://output', 'w');

            fwrite($handle, "\xEF\xBB\xBF");

            fputcsv($handle, [
                'ID',
                'الاسم',
                'البريد الإلكتروني',
                'تاريخ التسجيل',
            ]);

            foreach ($users as $u) {
                fputcsv($handle, [
                    $u->id,
                    $u->name,
                    $u->email,
                    $u->created_at,
                ]);
            }

            fclose($handle);
        }, 'users.csv', [
            'Content-Type' => 'text/csv; charset=UTF-8',
        ]);
    }

    /* ================= WRITERS ================= */

    private function exportWriters(): StreamedResponse
    {
        $writers = Writer::withCount('stories')->get();

        return response()->streamDownload(function () use ($writers) {

            $handle = fopen('php://output', 'w');

            fwrite($handle, "\xEF\xBB\xBF");

            fputcsv($handle, [
                'ID',
                'الاسم',
                'البريد الإلكتروني',
                'عدد القصص',
                'موثّق',
                'نشط',
            ]);

            foreach ($writers as $w) {
                fputcsv($handle, [
                    $w->id,
                    $w->name,
                    $w->email,
                    $w->stories_count,
                    $w->is_verified ? 'نعم' : 'لا',
                    $w->is_active ? 'نعم' : 'لا',
                ]);
            }

            fclose($handle);
        }, 'writers.csv', [
            'Content-Type' => 'text/csv; charset=UTF-8',
        ]);
    }

    /* ================= HELPER ================= */

    private function statusArabic($status): string
    {
        $map = [
            'published' => 'منشورة',
            'pending'   => 'بانتظار المراجعة',
            'rejected'  => 'مرفوضة',
            0 => 'بانتظار المراجعة',
            1 => 'منشورة',
            2 => 'مرفوضة',
        ];

        return $map[$status] ?? (string)$status;
    }
}
