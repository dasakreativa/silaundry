@extends('errors::minimal')

@section('image', asset('assets/img/pages/not-allowed.svg'))
@section('title', __('error.unauthorized.title'))
@section('code', '401')
@section('message', __('error.unauthorized.description'))
