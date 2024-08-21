<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Arr;

$jobs = [
    [
        'id' => 1,
        'title' => 'Director',
        'salary' => '$50,000'
    ],
    [
        'id' => 2,
        'title' => 'Programmer',
        'salary' => '$10,000'
    ],
    [
        'id' => 3,
        'title' => 'Designer',
        'salary' => '$15,000'
    ],
    [
        'id' => 4,
        'title' => 'Tester',
        'salary' => '$15,000'
    ]
];

Route::get('/', function () {
    return view('index');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/jobs', function () use($jobs) {
    return view('jobs', ['jobs' => $jobs]);

});

Route::get('/jobs/{id}', function ($id) use ($jobs) {
    $job = Arr::first($jobs, fn($job) => $job['id'] == $id);

    return view('job', ['job' => $job]);
});

