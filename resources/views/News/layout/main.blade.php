<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>@yield('title','Tin tức')</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

@include('News.layout.style')

<!-- =======================================================
  * Template Name: Mentor - v2.2.1
  * Template URL: https://bootstrapmade.com/mentor-free-education-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

@include('News.layout.header')

@yield('content')

@include('News.layout.footer')
<div id="preloader"></div>
<!-- JavaScript Libraries -->
@include('News.layout.script')


</body>
</html>
