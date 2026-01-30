@forelse($stories as $story)
    <div class="story-card">
        <h3>{{ $story->title }}</h3>
        <p>{{ $story->short_description }}</p>
        <span>{{ $story->age_group }} | {{ $story->category }}</span>
    </div>
@empty
    <p>لا توجد قصص مطابقة للفلترة</p>
@endforelse
