@extends('_layouts.master')

@section('title', 'About')

@section('content')
    <h1>Sobre mí</h1>

    <p>Mi nombre es {{ $page->owner->name }}</p>

    <h2>Enlaces:</h2>

    <ul>
        <li><a href="/linkedin" target="_blank">Linkedin</a></li>
        <li><a href="/github" target="_blank">GitHub</a></li>
    </ul>
@endsection
