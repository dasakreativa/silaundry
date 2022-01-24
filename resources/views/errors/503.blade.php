@extends('errors::minimal')

@section('image', asset('assets/img/pages/not-allowed.svg'))
@section('title', __('error.service-unavailable.title'))
@section('code', '503')
@section('message', __('error.service-unavailable.description'))
