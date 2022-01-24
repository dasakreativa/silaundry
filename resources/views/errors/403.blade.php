@extends('errors::minimal')

@section('image', asset('assets/img/pages/not-allowed.svg'))
@section('title', __('error.forbidden.title'))
@section('code', '403')
@section('message', __('error.forbidden.description'))
