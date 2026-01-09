@extends('layouts.shop')

@section('title', 'Admin - EHBALPHA')

@section('content')
    <div class="section">
        <h1>Admin Panel</h1>
        <p class="muted">Choose what you want to manage:</p>

        <div class="grid">
            <a class="card" href="{{ route('admin.news.index') }}">
                <div class="card-body">
                    <div class="card-title">Manage News</div>
                    <p class="card-desc">Create, edit and delete news items.</p>
                </div>
            </a>

            <a class="card" href="{{ route('admin.faq-categories.index') }}">
                <div class="card-body">
                    <div class="card-title">Manage FAQ Categories</div>
                    <p class="card-desc">Add and edit FAQ categories.</p>
                </div>
            </a>

            <a class="card" href="{{ route('admin.faq-items.index') }}">
                <div class="card-body">
                    <div class="card-title">Manage FAQ Items</div>
                    <p class="card-desc">Add and edit questions/answers.</p>
                </div>
            </a>
        </div>
    </div>
@endsection
