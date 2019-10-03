@extends('layouts.profile')
@section('title', 'Myプロフィール')

@section('content')
    <div class="container">
        <div class="row">
            <h2>プロフィール</h2>
        </div>
        <div class="row">
            <div class="list-news col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width="10%">氏名</th>
                                <th width="20%">性別</th>
                                <th width="50%">趣味</th>
                                <th width="10%">自己紹介欄</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>{{ $profile->name }}</th>
                                <th>{{ $profile->gender }}</th>
                                <th>{{ $profile->hobby }}</th>
                                <th>{{ $profile->introduction }}</th>
                                <td>
                                    <div>
                                        <a href="{{ action('Admin\ProfileController@edit', ['user_id' => Auth::user()->id]) }}">編集</a>
                                    </div>
                                </td>                                    
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection