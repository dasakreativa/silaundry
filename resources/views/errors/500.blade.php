@extends('errors::minimal')

@section('image', asset('assets/img/pages/not-allowed.svg'))
@section('title', __('error.server-error.title'))
@section('code', '500')
@section('message', __('error.server-error.description'))
