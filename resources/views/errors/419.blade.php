@extends('errors::minimal')

@section('image', asset('assets/img/pages/not-allowed.svg'))
@section('title', __('error.page-expired.title'))
@section('code', '419')
@section('message', __('error.page-expired.description'))
