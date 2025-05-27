<x-app-layout>
    <div class="container mx-auto py-6">
        <h2 class="text-2xl font-semibold">{{ $blog->title }}</h2>
        <p><strong>Author:</strong> {{ $blog->author->name }}</p>
        <div>{!! $blog->content !!}</div>
        <p><strong>Status:</strong> {{ ucfirst($blog->status) }}</p>
    </div>
</x-app-layout>
