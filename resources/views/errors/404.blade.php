@extends('errors::layout')

@section('image', asset('assets/img/pages/not-found.svg'))
@section('title', __('error.not-found.title'))
@section('code', '404')
@section('message', __('error.not-found.description'))
