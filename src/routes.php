<?php
    Route::get(\Config::get('laravel-poll::base_uri'), array('http', 'https', 'uses' => 'Fbf\LaravelPoll\PollController@showPoll', 'as' => 'show_poll'));
    Route::post(\Config::get('laravel-poll::base_uri'), array('http', 'https', 'uses' => 'Fbf\LaravelPoll\PollController@doPoll', 'as' => 'submit_poll'));