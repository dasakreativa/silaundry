@extends('errors::minimal')

@section('image', asset('assets/img/pages/not-allowed.svg'))
@section('title', __('error.many-request.title'))
@section('code', '429')
@section('message', __('error.many-request.description'))
