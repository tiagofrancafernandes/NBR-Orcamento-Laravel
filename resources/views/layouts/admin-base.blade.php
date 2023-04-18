<!DOCTYPE html>
<html dir="ltr" data-lt-installed="true" lang="en" class="adjust-brightness">

    <head>
        <style class="adjust-screen-brightness" media="screen">
            html.adjust-brightness::before {
                content: " ";
                z-index: 2147483647;
                pointer-events: none;
                position: fixed;
                left: 0;
                top: 0;
                width: 100vw;
                height: 100vh;
                background-color: rgba(0, 0, 0, 0.41000000000000003);
            }
        </style>
        <style type="text/css">
            .tippy-touch {
                cursor: pointer !important
            }

            .tippy-notransition {
                transition: none !important
            }

            .tippy-popper {
                max-width: 350px;
                -webkit-perspective: 700px;
                perspective: 700px;
                z-index: 9999;
                outline: 0;
                transition-timing-function: cubic-bezier(.165, .84, .44, 1);
                pointer-events: none;
                line-height: 1.4
            }

            .tippy-popper[data-html] {
                max-width: 96%;
                max-width: calc(100% - 20px)
            }

            .tippy-popper[x-placement^=top] .tippy-backdrop {
                border-radius: 40% 40% 0 0
            }

            .tippy-popper[x-placement^=top] .tippy-roundarrow {
                bottom: -8px;
                -webkit-transform-origin: 50% 0;
                transform-origin: 50% 0
            }

            .tippy-popper[x-placement^=top] .tippy-roundarrow svg {
                position: absolute;
                left: 0;
                -webkit-transform: rotate(180deg);
                transform: rotate(180deg)
            }

            .tippy-popper[x-placement^=top] .tippy-arrow {
                border-top: 7px solid #333;
                border-right: 7px solid transparent;
                border-left: 7px solid transparent;
                bottom: -7px;
                margin: 0 6px;
                -webkit-transform-origin: 50% 0;
                transform-origin: 50% 0
            }

            .tippy-popper[x-placement^=top] .tippy-backdrop {
                -webkit-transform-origin: 0 90%;
                transform-origin: 0 90%
            }

            .tippy-popper[x-placement^=top] .tippy-backdrop[data-state=visible] {
                -webkit-transform: scale(6) translate(-50%, 25%);
                transform: scale(6) translate(-50%, 25%);
                opacity: 1
            }

            .tippy-popper[x-placement^=top] .tippy-backdrop[data-state=hidden] {
                -webkit-transform: scale(1) translate(-50%, 25%);
                transform: scale(1) translate(-50%, 25%);
                opacity: 0
            }

            .tippy-popper[x-placement^=top] [data-animation=shift-toward][data-state=visible] {
                opacity: 1;
                -webkit-transform: translateY(-10px);
                transform: translateY(-10px)
            }

            .tippy-popper[x-placement^=top] [data-animation=shift-toward][data-state=hidden] {
                opacity: 0;
                -webkit-transform: translateY(-20px);
                transform: translateY(-20px)
            }

            .tippy-popper[x-placement^=top] [data-animation=perspective] {
                -webkit-transform-origin: bottom;
                transform-origin: bottom
            }

            .tippy-popper[x-placement^=top] [data-animation=perspective][data-state=visible] {
                opacity: 1;
                -webkit-transform: translateY(-10px) rotateX(0);
                transform: translateY(-10px) rotateX(0)
            }

            .tippy-popper[x-placement^=top] [data-animation=perspective][data-state=hidden] {
                opacity: 0;
                -webkit-transform: translateY(0) rotateX(90deg);
                transform: translateY(0) rotateX(90deg)
            }

            .tippy-popper[x-placement^=top] [data-animation=fade][data-state=visible] {
                opacity: 1;
                -webkit-transform: translateY(-10px);
                transform: translateY(-10px)
            }

            .tippy-popper[x-placement^=top] [data-animation=fade][data-state=hidden] {
                opacity: 0;
                -webkit-transform: translateY(-10px);
                transform: translateY(-10px)
            }

            .tippy-popper[x-placement^=top] [data-animation=shift-away][data-state=visible] {
                opacity: 1;
                -webkit-transform: translateY(-10px);
                transform: translateY(-10px)
            }

            .tippy-popper[x-placement^=top] [data-animation=shift-away][data-state=hidden] {
                opacity: 0;
                -webkit-transform: translateY(0);
                transform: translateY(0)
            }

            .tippy-popper[x-placement^=top] [data-animation=scale][data-state=visible] {
                opacity: 1;
                -webkit-transform: translateY(-10px) scale(1);
                transform: translateY(-10px) scale(1)
            }

            .tippy-popper[x-placement^=top] [data-animation=scale][data-state=hidden] {
                opacity: 0;
                -webkit-transform: translateY(0) scale(0);
                transform: translateY(0) scale(0)
            }

            .tippy-popper[x-placement^=bottom] .tippy-backdrop {
                border-radius: 0 0 30% 30%
            }

            .tippy-popper[x-placement^=bottom] .tippy-roundarrow {
                top: -8px;
                -webkit-transform-origin: 50% 100%;
                transform-origin: 50% 100%
            }

            .tippy-popper[x-placement^=bottom] .tippy-roundarrow svg {
                position: absolute;
                left: 0;
                -webkit-transform: rotate(0);
                transform: rotate(0)
            }

            .tippy-popper[x-placement^=bottom] .tippy-arrow {
                border-bottom: 7px solid #333;
                border-right: 7px solid transparent;
                border-left: 7px solid transparent;
                top: -7px;
                margin: 0 6px;
                -webkit-transform-origin: 50% 100%;
                transform-origin: 50% 100%
            }

            .tippy-popper[x-placement^=bottom] .tippy-backdrop {
                -webkit-transform-origin: 0 -90%;
                transform-origin: 0 -90%
            }

            .tippy-popper[x-placement^=bottom] .tippy-backdrop[data-state=visible] {
                -webkit-transform: scale(6) translate(-50%, -125%);
                transform: scale(6) translate(-50%, -125%);
                opacity: 1
            }

            .tippy-popper[x-placement^=bottom] .tippy-backdrop[data-state=hidden] {
                -webkit-transform: scale(1) translate(-50%, -125%);
                transform: scale(1) translate(-50%, -125%);
                opacity: 0
            }

            .tippy-popper[x-placement^=bottom] [data-animation=shift-toward][data-state=visible] {
                opacity: 1;
                -webkit-transform: translateY(10px);
                transform: translateY(10px)
            }

            .tippy-popper[x-placement^=bottom] [data-animation=shift-toward][data-state=hidden] {
                opacity: 0;
                -webkit-transform: translateY(20px);
                transform: translateY(20px)
            }

            .tippy-popper[x-placement^=bottom] [data-animation=perspective] {
                -webkit-transform-origin: top;
                transform-origin: top
            }

            .tippy-popper[x-placement^=bottom] [data-animation=perspective][data-state=visible] {
                opacity: 1;
                -webkit-transform: translateY(10px) rotateX(0);
                transform: translateY(10px) rotateX(0)
            }

            .tippy-popper[x-placement^=bottom] [data-animation=perspective][data-state=hidden] {
                opacity: 0;
                -webkit-transform: translateY(0) rotateX(-90deg);
                transform: translateY(0) rotateX(-90deg)
            }

            .tippy-popper[x-placement^=bottom] [data-animation=fade][data-state=visible] {
                opacity: 1;
                -webkit-transform: translateY(10px);
                transform: translateY(10px)
            }

            .tippy-popper[x-placement^=bottom] [data-animation=fade][data-state=hidden] {
                opacity: 0;
                -webkit-transform: translateY(10px);
                transform: translateY(10px)
            }

            .tippy-popper[x-placement^=bottom] [data-animation=shift-away][data-state=visible] {
                opacity: 1;
                -webkit-transform: translateY(10px);
                transform: translateY(10px)
            }

            .tippy-popper[x-placement^=bottom] [data-animation=shift-away][data-state=hidden] {
                opacity: 0;
                -webkit-transform: translateY(0);
                transform: translateY(0)
            }

            .tippy-popper[x-placement^=bottom] [data-animation=scale][data-state=visible] {
                opacity: 1;
                -webkit-transform: translateY(10px) scale(1);
                transform: translateY(10px) scale(1)
            }

            .tippy-popper[x-placement^=bottom] [data-animation=scale][data-state=hidden] {
                opacity: 0;
                -webkit-transform: translateY(0) scale(0);
                transform: translateY(0) scale(0)
            }

            .tippy-popper[x-placement^=left] .tippy-backdrop {
                border-radius: 50% 0 0 50%
            }

            .tippy-popper[x-placement^=left] .tippy-roundarrow {
                right: -16px;
                -webkit-transform-origin: 33.33333333% 50%;
                transform-origin: 33.33333333% 50%
            }

            .tippy-popper[x-placement^=left] .tippy-roundarrow svg {
                position: absolute;
                left: 0;
                -webkit-transform: rotate(90deg);
                transform: rotate(90deg)
            }

            .tippy-popper[x-placement^=left] .tippy-arrow {
                border-left: 7px solid #333;
                border-top: 7px solid transparent;
                border-bottom: 7px solid transparent;
                right: -7px;
                margin: 3px 0;
                -webkit-transform-origin: 0 50%;
                transform-origin: 0 50%
            }

            .tippy-popper[x-placement^=left] .tippy-backdrop {
                -webkit-transform-origin: 100% 0;
                transform-origin: 100% 0
            }

            .tippy-popper[x-placement^=left] .tippy-backdrop[data-state=visible] {
                -webkit-transform: scale(6) translate(40%, -50%);
                transform: scale(6) translate(40%, -50%);
                opacity: 1
            }

            .tippy-popper[x-placement^=left] .tippy-backdrop[data-state=hidden] {
                -webkit-transform: scale(1.5) translate(40%, -50%);
                transform: scale(1.5) translate(40%, -50%);
                opacity: 0
            }

            .tippy-popper[x-placement^=left] [data-animation=shift-toward][data-state=visible] {
                opacity: 1;
                -webkit-transform: translateX(-10px);
                transform: translateX(-10px)
            }

            .tippy-popper[x-placement^=left] [data-animation=shift-toward][data-state=hidden] {
                opacity: 0;
                -webkit-transform: translateX(-20px);
                transform: translateX(-20px)
            }

            .tippy-popper[x-placement^=left] [data-animation=perspective] {
                -webkit-transform-origin: right;
                transform-origin: right
            }

            .tippy-popper[x-placement^=left] [data-animation=perspective][data-state=visible] {
                opacity: 1;
                -webkit-transform: translateX(-10px) rotateY(0);
                transform: translateX(-10px) rotateY(0)
            }

            .tippy-popper[x-placement^=left] [data-animation=perspective][data-state=hidden] {
                opacity: 0;
                -webkit-transform: translateX(0) rotateY(-90deg);
                transform: translateX(0) rotateY(-90deg)
            }

            .tippy-popper[x-placement^=left] [data-animation=fade][data-state=visible] {
                opacity: 1;
                -webkit-transform: translateX(-10px);
                transform: translateX(-10px)
            }

            .tippy-popper[x-placement^=left] [data-animation=fade][data-state=hidden] {
                opacity: 0;
                -webkit-transform: translateX(-10px);
                transform: translateX(-10px)
            }

            .tippy-popper[x-placement^=left] [data-animation=shift-away][data-state=visible] {
                opacity: 1;
                -webkit-transform: translateX(-10px);
                transform: translateX(-10px)
            }

            .tippy-popper[x-placement^=left] [data-animation=shift-away][data-state=hidden] {
                opacity: 0;
                -webkit-transform: translateX(0);
                transform: translateX(0)
            }

            .tippy-popper[x-placement^=left] [data-animation=scale][data-state=visible] {
                opacity: 1;
                -webkit-transform: translateX(-10px) scale(1);
                transform: translateX(-10px) scale(1)
            }

            .tippy-popper[x-placement^=left] [data-animation=scale][data-state=hidden] {
                opacity: 0;
                -webkit-transform: translateX(0) scale(0);
                transform: translateX(0) scale(0)
            }

            .tippy-popper[x-placement^=right] .tippy-backdrop {
                border-radius: 0 50% 50% 0
            }

            .tippy-popper[x-placement^=right] .tippy-roundarrow {
                left: -16px;
                -webkit-transform-origin: 66.66666666% 50%;
                transform-origin: 66.66666666% 50%
            }

            .tippy-popper[x-placement^=right] .tippy-roundarrow svg {
                position: absolute;
                left: 0;
                -webkit-transform: rotate(-90deg);
                transform: rotate(-90deg)
            }

            .tippy-popper[x-placement^=right] .tippy-arrow {
                border-right: 7px solid #333;
                border-top: 7px solid transparent;
                border-bottom: 7px solid transparent;
                left: -7px;
                margin: 3px 0;
                -webkit-transform-origin: 100% 50%;
                transform-origin: 100% 50%
            }

            .tippy-popper[x-placement^=right] .tippy-backdrop {
                -webkit-transform-origin: -100% 0;
                transform-origin: -100% 0
            }

            .tippy-popper[x-placement^=right] .tippy-backdrop[data-state=visible] {
                -webkit-transform: scale(6) translate(-140%, -50%);
                transform: scale(6) translate(-140%, -50%);
                opacity: 1
            }

            .tippy-popper[x-placement^=right] .tippy-backdrop[data-state=hidden] {
                -webkit-transform: scale(1.5) translate(-140%, -50%);
                transform: scale(1.5) translate(-140%, -50%);
                opacity: 0
            }

            .tippy-popper[x-placement^=right] [data-animation=shift-toward][data-state=visible] {
                opacity: 1;
                -webkit-transform: translateX(10px);
                transform: translateX(10px)
            }

            .tippy-popper[x-placement^=right] [data-animation=shift-toward][data-state=hidden] {
                opacity: 0;
                -webkit-transform: translateX(20px);
                transform: translateX(20px)
            }

            .tippy-popper[x-placement^=right] [data-animation=perspective] {
                -webkit-transform-origin: left;
                transform-origin: left
            }

            .tippy-popper[x-placement^=right] [data-animation=perspective][data-state=visible] {
                opacity: 1;
                -webkit-transform: translateX(10px) rotateY(0);
                transform: translateX(10px) rotateY(0)
            }

            .tippy-popper[x-placement^=right] [data-animation=perspective][data-state=hidden] {
                opacity: 0;
                -webkit-transform: translateX(0) rotateY(90deg);
                transform: translateX(0) rotateY(90deg)
            }

            .tippy-popper[x-placement^=right] [data-animation=fade][data-state=visible] {
                opacity: 1;
                -webkit-transform: translateX(10px);
                transform: translateX(10px)
            }

            .tippy-popper[x-placement^=right] [data-animation=fade][data-state=hidden] {
                opacity: 0;
                -webkit-transform: translateX(10px);
                transform: translateX(10px)
            }

            .tippy-popper[x-placement^=right] [data-animation=shift-away][data-state=visible] {
                opacity: 1;
                -webkit-transform: translateX(10px);
                transform: translateX(10px)
            }

            .tippy-popper[x-placement^=right] [data-animation=shift-away][data-state=hidden] {
                opacity: 0;
                -webkit-transform: translateX(0);
                transform: translateX(0)
            }

            .tippy-popper[x-placement^=right] [data-animation=scale][data-state=visible] {
                opacity: 1;
                -webkit-transform: translateX(10px) scale(1);
                transform: translateX(10px) scale(1)
            }

            .tippy-popper[x-placement^=right] [data-animation=scale][data-state=hidden] {
                opacity: 0;
                -webkit-transform: translateX(0) scale(0);
                transform: translateX(0) scale(0)
            }

            .tippy-tooltip {
                position: relative;
                color: #fff;
                border-radius: 4px;
                font-size: .9rem;
                padding: .3rem .6rem;
                text-align: center;
                will-change: transform;
                -webkit-font-smoothing: antialiased;
                -moz-osx-font-smoothing: grayscale;
                background-color: #333
            }

            .tippy-tooltip[data-size=small] {
                padding: .2rem .4rem;
                font-size: .75rem
            }

            .tippy-tooltip[data-size=large] {
                padding: .4rem .8rem;
                font-size: 1rem
            }

            .tippy-tooltip[data-animatefill] {
                overflow: hidden;
                background-color: transparent
            }

            .tippy-tooltip[data-animatefill] .tippy-content {
                transition: -webkit-clip-path cubic-bezier(.46, .1, .52, .98);
                transition: clip-path cubic-bezier(.46, .1, .52, .98);
                transition: clip-path cubic-bezier(.46, .1, .52, .98), -webkit-clip-path cubic-bezier(.46, .1, .52, .98)
            }

            .tippy-tooltip[data-interactive],
            .tippy-tooltip[data-interactive] path {
                pointer-events: auto
            }

            .tippy-tooltip[data-inertia][data-state=visible] {
                transition-timing-function: cubic-bezier(.53, 2, .36, .85)
            }

            .tippy-tooltip[data-inertia][data-state=hidden] {
                transition-timing-function: ease
            }

            .tippy-arrow,
            .tippy-roundarrow {
                position: absolute;
                width: 0;
                height: 0
            }

            .tippy-roundarrow {
                width: 24px;
                height: 8px;
                fill: #333;
                pointer-events: none
            }

            .tippy-backdrop {
                position: absolute;
                will-change: transform;
                background-color: #333;
                border-radius: 50%;
                width: 26%;
                left: 50%;
                top: 50%;
                z-index: -1;
                transition: all cubic-bezier(.46, .1, .52, .98);
                -webkit-backface-visibility: hidden;
                backface-visibility: hidden
            }

            .tippy-backdrop:after {
                content: "";
                float: left;
                padding-top: 100%
            }

            body:not(.tippy-touch) .tippy-tooltip[data-animatefill][data-state=visible] .tippy-content {
                -webkit-clip-path: ellipse(100% 100% at 50% 50%);
                clip-path: ellipse(100% 100% at 50% 50%)
            }

            body:not(.tippy-touch) .tippy-tooltip[data-animatefill][data-state=hidden] .tippy-content {
                -webkit-clip-path: ellipse(5% 50% at 50% 50%);
                clip-path: ellipse(5% 50% at 50% 50%)
            }

            body:not(.tippy-touch) .tippy-popper[x-placement=right] .tippy-tooltip[data-animatefill][data-state=visible] .tippy-content {
                -webkit-clip-path: ellipse(135% 100% at 0 50%);
                clip-path: ellipse(135% 100% at 0 50%)
            }

            body:not(.tippy-touch) .tippy-popper[x-placement=right] .tippy-tooltip[data-animatefill][data-state=hidden] .tippy-content {
                -webkit-clip-path: ellipse(40% 100% at 0 50%);
                clip-path: ellipse(40% 100% at 0 50%)
            }

            body:not(.tippy-touch) .tippy-popper[x-placement=left] .tippy-tooltip[data-animatefill][data-state=visible] .tippy-content {
                -webkit-clip-path: ellipse(135% 100% at 100% 50%);
                clip-path: ellipse(135% 100% at 100% 50%)
            }

            body:not(.tippy-touch) .tippy-popper[x-placement=left] .tippy-tooltip[data-animatefill][data-state=hidden] .tippy-content {
                -webkit-clip-path: ellipse(40% 100% at 100% 50%);
                clip-path: ellipse(40% 100% at 100% 50%)
            }

            @media (max-width:360px) {
                .tippy-popper {
                    max-width: 96%;
                    max-width: calc(100% - 20px)
                }
            }

        </style>

        <style>
            .fixed-navbar .dashboard-nav-container{
                padding: 0px !important;
            }

            .fixed-navbar .simplebar-content {
                padding-bottom: 0px !important;
                margin-bottom: 0px !important;
            }

            .simplebar-content .dashboard-nav-container .dashboard-responsive-nav-container {
                background-color: #333 !important;
                color: #fff !important;;
                box-shadow: 0 3px 10px rgba(0, 0, 0, .15) !important;
                background-color: #333 !important;

                transform: none;
                max-width: 100%;
                /* transform: translateY(-51%); */
                border-radius: 4px;
                border-radius: 0;
                font-weight: 600;
                /* background-color: #f0f0f0 !important; */
                border-radius: 5px;
            }

            .dashboard-responsive-content {
                padding-top: 0.3rem;
                display: table-cell;
                vertical-align: middle;
            }

            .dashboard-responsive-title {}

            .show-only-on-fixed-navbar {
                display: none;
            }

            .fixed-navbar .show-only-on-fixed-navbar,
            .fixed-navbar .show-on-fixed-navbar {
                display: block;
            }

            .fixed-navbar .simplebar-content .dashboard-nav-container .dashboard-responsive-nav-container {
                color: #333 !important;
                background-color: #f0f0f0 !important;
                border-radius: 0 !important;
            }

            .fixed-navbar .dashboard-responsive-nav-container {
                margin-top: 0 !important;
                margin-bottom: 0 !important;
                padding-bottom: 0.5rem !important;
                padding-top: 0.8rem !important;
                border-radius: 0;
            }

            .fixed-navbar .dashboard-responsive-nav-container.active {
                padding-bottom: 1rem !important;
            }

            .hamburger-inner,
            .hamburger-inner::before,
            .hamburger-inner::after {
                border-radius: 0 !important;
                height: 0.35rem !important;
            }

            .hamburger-inner::before { height: 0.38rem !important; }

            .fixed-navbar .hamburger-inner,
            .fixed-navbar .hamburger-inner::before,
            .fixed-navbar .hamburger-inner::after {
                background-color: #555 !important;
            }
        </style>
        <title>Dashboard - {{ config('app.name', 'Laravel') }}</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="author" content="{{ config('app.name', 'Laravel') }}">
        <meta name="keywords" content="">
        <meta name="description" content="">
        <link rel="dns-prefetch" href="//fonts.googleapis.com">
        <link rel="dns-prefetch" href="//google.com">
        <link rel="dns-prefetch" href="//apis.google.com">
        <link rel="dns-prefetch" href="//ajax.googleapis.com">
        <link rel="dns-prefetch" href="//www.google-analytics.com">
        <link rel="dns-prefetch" href="//pagead2.googlesyndication.com">
        <link rel="dns-prefetch" href="//gstatic.com">
        <link rel="dns-prefetch" href="//oss.maxcdn.com">
        <link rel="dns-prefetch" href="//fonts.gstatic.com">

        <!-- Scripts -->
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])

        <meta property="fb:app_id" content="">
        <meta property="og:site_name" content="{{ config('app.name', 'Laravel') }}">
        <meta property="og:locale" content="en_US">
        <meta property="og:url" content="{{ url('/') }}/dashboard">
        <meta property="og:title" content="Dashboard - {{ config('app.name', 'Laravel') }}">
        <meta property="og:description" content="">
        <meta property="og:type" content="website">
        <meta property="og:image" content="{{ url('/') }}/dashboard-assets/img/storage/logo/2024283059.png">
        <meta property="twitter:card" content="summary">
        <meta property="twitter:title" content="Dashboard - {{ config('app.name', 'Laravel') }}">
        <meta property="twitter:description" content="">
        <meta property="twitter:domain" content="{{ url('/') }}">
        <meta name="twitter:image:src" content="{{ url('/') }}/dashboard-assets/img/storage/logo/2024283059.png">
        <link rel="shortcut icon" href="{{ url('/') }}/dashboard-assets/img/storage/logo/400028613.png">
        <script async="">
            var themecolor = '#10a37f';
            var mapcolor = '#8080ff';
            var siteurl = "{{ url('/') }}";
            var template_name = 'classic-theme';
            window.site_base_url = window.site_base_url || "{{ url('/') }}";
        </script>
        <!--Loop for Theme Color codes-->
        <style>
            :root {
                --theme-color-0_01: rgba(16, 163, 127, 0.01);
                --theme-color-0_02: rgba(16, 163, 127, 0.02);
                --theme-color-0_03: rgba(16, 163, 127, 0.03);
                --theme-color-0_04: rgba(16, 163, 127, 0.04);
                --theme-color-0_05: rgba(16, 163, 127, 0.05);
                --theme-color-0_06: rgba(16, 163, 127, 0.06);
                --theme-color-0_07: rgba(16, 163, 127, 0.07);
                --theme-color-0_08: rgba(16, 163, 127, 0.08);
                --theme-color-0_09: rgba(16, 163, 127, 0.09);
                --theme-color-0_1: rgba(16, 163, 127, 0.1);
                --theme-color-0_11: rgba(16, 163, 127, 0.11);
                --theme-color-0_12: rgba(16, 163, 127, 0.12);
                --theme-color-0_13: rgba(16, 163, 127, 0.13);
                --theme-color-0_14: rgba(16, 163, 127, 0.14);
                --theme-color-0_15: rgba(16, 163, 127, 0.15);
                --theme-color-0_16: rgba(16, 163, 127, 0.16);
                --theme-color-0_17: rgba(16, 163, 127, 0.17);
                --theme-color-0_18: rgba(16, 163, 127, 0.18);
                --theme-color-0_19: rgba(16, 163, 127, 0.19);
                --theme-color-0_2: rgba(16, 163, 127, 0.2);
                --theme-color-0_21: rgba(16, 163, 127, 0.21);
                --theme-color-0_22: rgba(16, 163, 127, 0.22);
                --theme-color-0_23: rgba(16, 163, 127, 0.23);
                --theme-color-0_24: rgba(16, 163, 127, 0.24);
                --theme-color-0_25: rgba(16, 163, 127, 0.25);
                --theme-color-0_26: rgba(16, 163, 127, 0.26);
                --theme-color-0_27: rgba(16, 163, 127, 0.27);
                --theme-color-0_28: rgba(16, 163, 127, 0.28);
                --theme-color-0_29: rgba(16, 163, 127, 0.29);
                --theme-color-0_3: rgba(16, 163, 127, 0.3);
                --theme-color-0_31: rgba(16, 163, 127, 0.31);
                --theme-color-0_32: rgba(16, 163, 127, 0.32);
                --theme-color-0_33: rgba(16, 163, 127, 0.33);
                --theme-color-0_34: rgba(16, 163, 127, 0.34);
                --theme-color-0_35: rgba(16, 163, 127, 0.35);
                --theme-color-0_36: rgba(16, 163, 127, 0.36);
                --theme-color-0_37: rgba(16, 163, 127, 0.37);
                --theme-color-0_38: rgba(16, 163, 127, 0.38);
                --theme-color-0_39: rgba(16, 163, 127, 0.39);
                --theme-color-0_4: rgba(16, 163, 127, 0.4);
                --theme-color-0_41: rgba(16, 163, 127, 0.41);
                --theme-color-0_42: rgba(16, 163, 127, 0.42);
                --theme-color-0_43: rgba(16, 163, 127, 0.43);
                --theme-color-0_44: rgba(16, 163, 127, 0.44);
                --theme-color-0_45: rgba(16, 163, 127, 0.45);
                --theme-color-0_46: rgba(16, 163, 127, 0.46);
                --theme-color-0_47: rgba(16, 163, 127, 0.47);
                --theme-color-0_48: rgba(16, 163, 127, 0.48);
                --theme-color-0_49: rgba(16, 163, 127, 0.49);
                --theme-color-0_5: rgba(16, 163, 127, 0.5);
                --theme-color-0_51: rgba(16, 163, 127, 0.51);
                --theme-color-0_52: rgba(16, 163, 127, 0.52);
                --theme-color-0_53: rgba(16, 163, 127, 0.53);
                --theme-color-0_54: rgba(16, 163, 127, 0.54);
                --theme-color-0_55: rgba(16, 163, 127, 0.55);
                --theme-color-0_56: rgba(16, 163, 127, 0.56);
                --theme-color-0_57: rgba(16, 163, 127, 0.57);
                --theme-color-0_58: rgba(16, 163, 127, 0.58);
                --theme-color-0_59: rgba(16, 163, 127, 0.59);
                --theme-color-0_6: rgba(16, 163, 127, 0.6);
                --theme-color-0_61: rgba(16, 163, 127, 0.61);
                --theme-color-0_62: rgba(16, 163, 127, 0.62);
                --theme-color-0_63: rgba(16, 163, 127, 0.63);
                --theme-color-0_64: rgba(16, 163, 127, 0.64);
                --theme-color-0_65: rgba(16, 163, 127, 0.65);
                --theme-color-0_66: rgba(16, 163, 127, 0.66);
                --theme-color-0_67: rgba(16, 163, 127, 0.67);
                --theme-color-0_68: rgba(16, 163, 127, 0.68);
                --theme-color-0_69: rgba(16, 163, 127, 0.69);
                --theme-color-0_7: rgba(16, 163, 127, 0.7);
                --theme-color-0_71: rgba(16, 163, 127, 0.71);
                --theme-color-0_72: rgba(16, 163, 127, 0.72);
                --theme-color-0_73: rgba(16, 163, 127, 0.73);
                --theme-color-0_74: rgba(16, 163, 127, 0.74);
                --theme-color-0_75: rgba(16, 163, 127, 0.75);
                --theme-color-0_76: rgba(16, 163, 127, 0.76);
                --theme-color-0_77: rgba(16, 163, 127, 0.77);
                --theme-color-0_78: rgba(16, 163, 127, 0.78);
                --theme-color-0_79: rgba(16, 163, 127, 0.79);
                --theme-color-0_8: rgba(16, 163, 127, 0.8);
                --theme-color-0_81: rgba(16, 163, 127, 0.81);
                --theme-color-0_82: rgba(16, 163, 127, 0.82);
                --theme-color-0_83: rgba(16, 163, 127, 0.83);
                --theme-color-0_84: rgba(16, 163, 127, 0.84);
                --theme-color-0_85: rgba(16, 163, 127, 0.85);
                --theme-color-0_86: rgba(16, 163, 127, 0.86);
                --theme-color-0_87: rgba(16, 163, 127, 0.87);
                --theme-color-0_88: rgba(16, 163, 127, 0.88);
                --theme-color-0_89: rgba(16, 163, 127, 0.89);
                --theme-color-0_9: rgba(16, 163, 127, 0.9);
                --theme-color-0_91: rgba(16, 163, 127, 0.91);
                --theme-color-0_92: rgba(16, 163, 127, 0.92);
                --theme-color-0_93: rgba(16, 163, 127, 0.93);
                --theme-color-0_94: rgba(16, 163, 127, 0.94);
                --theme-color-0_95: rgba(16, 163, 127, 0.95);
                --theme-color-0_96: rgba(16, 163, 127, 0.96);
                --theme-color-0_97: rgba(16, 163, 127, 0.97);
                --theme-color-0_98: rgba(16, 163, 127, 0.98);
                --theme-color-0_99: rgba(16, 163, 127, 0.99);
                --theme-color-1: rgba(16, 163, 127, 1);
            }

        </style>
        <!--Loop for Theme Color codes-->
        <link rel="stylesheet" href="{{ url('/') }}/dashboard-assets/css/flags.min.css">
        <link rel="stylesheet" href="{{ url('/') }}/dashboard-assets/css/icons.css">

        {{-- <link rel="stylesheet" href="{{ url('/') }}/dashboard-assets/css/style.css"> --}}
        <link rel="stylesheet" href="{{ asset('dashboard-assets/css/dash-style.css') }}">

        <link rel="stylesheet" href="{{ url('/') }}/dashboard-assets/css/color.css">
        <script src="{{ url('/') }}/dashboard-assets/js/jquery.min.js"></script>

        <!-- ===External Code=== -->
        <script>
            if (top.location != location) {
                top.location.replace(location);
            }
        </script>
        <!-- End of Statcounter Code --> <!-- ===/External Code=== -->
        <style type="text/css">
            /* Chart.js */
            @-webkit-keyframes chartjs-render-animation {
                from {
                    opacity: 0.99
                }

                to {
                    opacity: 1
                }
            }

            @keyframes chartjs-render-animation {
                from {
                    opacity: 0.99
                }

                to {
                    opacity: 1
                }
            }

            .chartjs-render-monitor {
                -webkit-animation: chartjs-render-animation 0.001s;
                animation: chartjs-render-animation 0.001s;
            }

        </style>
        <style type="text/css">
            @media print {
                .hide-on-print {
                    display: none !important;
                }
            }

            /* The navigation bar */
            .fixed-navbar {
                overflow: hidden;
                background-color: #333;
                position: fixed !important;
                /* Set the navbar to fixed position */
                top: 0;
                /* Position the navbar at the top of the page */
                width: 100%;
                /* Full width */
                animation: trigger-repaint 0.1s 0.9s;
                /* transition: all 0.8s linear; */
                box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
                cursor: pointer;
                outline: none;
            }

            @keyframes slide-in-from-left {
                0% {
                    transform: translateX(0%);
                }

                100% {
                    transform: translateX(0%);
                }
            }

            @keyframes trigger-repaint {
                0% {
                    transform: scale(1);
                }

                100% {
                    transform: scale(1);
                }
            }

            /* Bottom blur border  */
            .bottom-border {
                box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
                cursor: pointer;
                outline: none;
            }

            .fixed-navbar .btn-group.bootstrap-select.language-switcher {
                display: none !important;
            }

        </style>
        {{--
            <script
                src="https://cdn.jsdelivr.net/emojione/2.2.7/lib/js/emojione.min.js"
                type="text/javascript" async defer>
            </script>
        --}}

        <style type="text/css">
            @keyframes animationOnOpen {
                0% {
                    opacity: 0;
                    transform: translate(0, 30px);
                }

                to {
                    opacity: 1;
                    transform: translate(0, 0px);
                }
            }

            @-moz-keyframes animationOnOpen {
                0% {
                    opacity: 0;
                    transform: translate(0, 30px);
                }

                to {
                    opacity: 1;
                    transform: translate(0, 0px);
                }
            }

            @-webkit-keyframes animationOnOpen {
                0% {
                    opacity: 0;
                    transform: translate(0, 30px);
                }

                to {
                    opacity: 1;
                    transform: translate(0, 0px);
                }
            }

            .animation-on-open.open {
                animation: animationOnOpen .25s ease !important;
            }
        </style>
    </head>

    <body data-role="page" class="ltr" id="page" data-tippy-delegate="">
        <!--[if lt IE 8]>
  <p class="browserupgrade">
      You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
      your browser</a> to improve your experience.
  </p>
  <![endif]-->
        <!-- Wrapper -->
        <div id="wrapper" class="" style="padding-top: 5rem;">
            <!-- Header Container -->
            <header id="header-container" class="fullwidth dashboard-header sticky">
                <!-- Header -->
                <div id="header">
                    <div class="container">
                        <!-- Left Side Content -->
                        <div class="left-side">
                            <!-- Logo -->
                            <div id="logo">
                                <a href="{{ url('/') }}">
                                    <img src="{{ url('/') }}/dashboard-assets/img/storage/logo/2024283059.png"
                                                                                      data-sticky-logo="{{ url('/') }}/dashboard-assets/img/storage/logo/2024283059.png"
                                                                                      data-transparent-logo="{{ url('/') }}/dashboard-assets/img/storage/logo/1380968960.png"
                                                                                      alt="{{ config('app.name', 'Laravel') }}">
                                </a>
                            </div>
                            <a href="javascript:void(0);" class="header-icon">
                                <i class="fa fa-bars"></i>
                            </a>
                        </div>
                        <!-- Left Side Content / End -->
                        <!-- Right Side Content / End -->
                        <div class="right-side">
                            <!-- User Menu -->
                            <div class="header-widget">
                                <!-- Messages -->
                                <div class="header-notifications user-menu">
                                    <div class="header-notifications-trigger">
                                        <a href="#" title="demo">
                                            <div class="user-avatar status-online"><img src="{{ url('/') }}/dashboard-assets/img/storage/profile/812145019.jpg"
                                                                                                  alt="demo"></div>
                                        </a>
                                    </div>
                                    <!-- Dropdown -->
                                    <div class="header-notifications-dropdown">
                                        <ul class="user-menu-small-nav">
                                            <li><a href="{{ url('/') }}/dashboard"><i
                                                                                                      class="icon-feather-grid"></i>
                                                    Dashboard</a></li>
                                            <li><a href="{{ url('/') }}/ai-templates"><i
                                                                                                      class="icon-feather-layers"></i>
                                                    Templates</a>
                                            </li>
                                            <li><a href="{{ url('/') }}/ai-images"><i
                                                                                                      class="icon-feather-image"></i>
                                                    AI Images</a>
                                            </li>
                                            <li><a href="{{ url('/') }}/ai-chat"><i
                                                                                                      class="icon-feather-message-circle"></i>
                                                    AI Chat </a></li>
                                            <li><a href="{{ url('/') }}/ai-speech-text"><i
                                                                                                      class="icon-feather-headphones"></i>
                                                    Speech to Text </a></li>
                                            <li><a href="{{ url('/') }}/ai-code"><i
                                                                                                      class="icon-feather-code"></i>
                                                    AI Code</a>
                                            </li>
                                            <li><a href="{{ url('/') }}/all-documents"><i
                                                                                                      class="icon-feather-file-text"></i>
                                                    All Documents </a></li>
                                            <li><a href="{{ url('/') }}/membership"><i
                                                                                                      class="icon-feather-gift"></i>
                                                    Membership</a>
                                            </li>
                                            <li><a href="{{ url('/') }}/account-setting"><i
                                                                                                      class="icon-feather-settings"></i>
                                                    Account Setting </a></li>
                                            <li><a href="{{ url('/') }}/logout"><i
                                                                                                      class="icon-feather-log-out"></i>
                                                    Logout</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- User Menu / End -->
                            <div class="header-widget">
                                <div class="btn-group bootstrap-select language-switcher">
                                    <button type="button" class="btn dropdown-toggle btn-default" data-toggle="dropdown"
                                                                                      title="English"
                                                                                      aria-expanded="false">
                                        <span class="filter-option pull-left" id="selected_lang">en</span>&nbsp; <span
                                                                                          class="caret"></span>
                                    </button>
                                    <div class="dropdown-menu scrollable-menu open">
                                        <ul class="dropdown-menu inner">
                                            <li data-lang="portuguese">
                                                <a role="menuitem" tabindex="-1" rel="alternate" href="{{ url('/pt') }}">Portuguese</a>
                                            </li>

                                            <li data-lang="english">
                                                <a role="menuitem" tabindex="-1" rel="alternate" href="{{ url('/en') }}">English</a>
                                            </li>

                                            <li data-lang="spanish">
                                                <a role="menuitem" tabindex="-1" rel="alternate" href="{{ url('/es') }}">Spanish</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Right Side Content / End -->
                    </div>
                </div>
                <!-- Header / End -->
            </header>
            <div class="clearfix"></div>
            <!-- Header Container / End -->
            <!-- Dashboard Container -->
            <div class="dashboard-container" style="height: 714.75px;">
                <!-- Dashboard Sidebar -->
                <div class="dashboard-sidebar">
                    <div class="dashboard-sidebar-inner" data-simplebar="init" style="height: 714.75px;">
                        <div class="simplebar-track vertical" style="visibility: visible; display: none;">
                            <div class="simplebar-scrollbar" style="visibility: visible; top: 0px; height: 25px;"></div>
                        </div>
                        <div class="simplebar-track horizontal" style="visibility: visible; display: none;">
                            <div class="simplebar-scrollbar" style="visibility: visible; left: 0px; width: 25px;"></div>
                        </div>
                        <div class="simplebar-scroll-content" style="padding-right: 20px; margin-bottom: -20px;">
                            <div class="simplebar-content" style="padding-bottom: 20px;">
                                <div class="dashboard-nav-container">
                                    <!-- Responsive Navigation Trigger -->
                                    <div class="dashboard-responsive-nav-container margin-top-20">
                                        <div class="d-md-none d-flex">
                                            <a href="#" class="dashboard-responsive-nav-trigger">
                                                <span class="hamburger hamburger--collapse">
                                                    <span class="hamburger-box">
                                                        <span class="hamburger-inner"></span>
                                                    </span>
                                                </span>
                                            </a>
                                            <div
                                                style="width: 100% !important;padding-right: 1rem;padding-left: 0.5rem;padding-top: 0.2rem;"
                                                class="d-flex justify-content-center"
                                            >
                                                <div class="app-logo ml-1">
                                                    <a href="{{ url('/') }}">
                                                        <img src="{{ url('/') }}/dashboard-assets/img/storage/logo/2024283059.png"
                                                            data-sticky-logo="{{ url('/') }}/dashboard-assets/img/storage/logo/2024283059.png"
                                                            data-transparent-logo="{{ url('/') }}/dashboard-assets/img/storage/logo/1380968960.png"
                                                            alt="{{ config('app.name', 'Laravel') }}">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Navigation -->
                                    <div class="dashboard-nav">
                                        <div class="dashboard-nav-inner">
                                            <ul data-submenu-title="My Account">
                                                <li class="active"><a href="{{ url('/') }}/dashboard"><i
                                                                                                          class="icon-feather-grid"></i>
                                                        Dashboard</a></li>
                                                <li class="">
                                                    <a href="#"><i class="icon-feather-file-text"></i> My Documents</a>
                                                    <ul>
                                                        <li class=""><a
                                                                                                              href="{{ url('/') }}/all-documents">All
                                                                Documents</a></li>
                                                        <li class=""><a
                                                                                                              href="{{ url('/') }}/all-images">All
                                                                AI Images</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                            <ul data-submenu-title="Organize and Manage">
                                                <li class="">
                                                    <a href="{{ url('/') }}/ai-templates"><i
                                                                                                          class="icon-feather-layers"></i>
                                                        Templates</a>
                                                </li>
                                                <li class=""><a href="{{ url('/') }}/ai-images"><i
                                                                                                          class="icon-feather-image"></i>
                                                        AI Images</a></li>
                                                <li class=""><a href="{{ url('/') }}/ai-chat"><i
                                                                                                          class="icon-feather-message-circle"></i>
                                                        AI Chat</a></li>
                                                <li class=""><a href="{{ url('/') }}/ai-speech-text"><i
                                                                                                          class="icon-feather-headphones"></i>
                                                        Speech to Text</a></li>
                                                <li class=""><a href="{{ url('/') }}/ai-code"><i
                                                                                                          class="icon-feather-code"></i>
                                                        AI Code</a></li>
                                            </ul>
                                            <ul data-submenu-title="Account">
                                                <li class="">
                                                    <a href="{{ url('/') }}/affiliate-program"><i
                                                                                                          class="icon-feather-share-2"></i>
                                                        Affiliate Program</a>
                                                    <ul>
                                                        <li class=""><a
                                                                                                              href="{{ url('/') }}/affiliate-program">Affiliate
                                                                Program</a></li>
                                                        <li class=""><a
                                                                                                              href="{{ url('/') }}/withdrawals">Withdrawals</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class=""><a href="{{ url('/') }}/membership"><i
                                                                                                          class="icon-feather-gift"></i>
                                                        Membership</a></li>
                                                <li class=""><a href="{{ url('/') }}/transaction"><i
                                                                                                          class="icon-feather-file-text"></i>
                                                        Transactions</a></li>
                                                <li class=""><a href="{{ url('/') }}/account-setting"><i
                                                                                                          class="icon-feather-log-out"></i>
                                                        Account Setting</a></li>
                                                <li><a href="{{ url('/') }}/logout"><i
                                                                                                          class="icon-material-outline-power-settings-new"></i>
                                                        Logout</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- Navigation / End -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Dashboard Sidebar / End --> <!-- Dashboard Content -->
                <div class="dashboard-content-container" data-simplebar="init" style="height: 714.75px;">
                    <div class="simplebar-track vertical" style="visibility: visible;">
                        <div class="simplebar-scrollbar" style="visibility: visible; top: 0px; height: 1129px;"></div>
                    </div>
                    <div class="simplebar-track horizontal" style="visibility: visible;">
                        <div class="simplebar-scrollbar" style="visibility: visible; left: 0px; width: 25px;"></div>
                    </div>
                    <div class="simplebar-scroll-content" style="padding-right: 20px; margin-bottom: -20px;">
                        <div class="simplebar-content" style="padding-bottom: 20px;">
                            <div class="dashboard-content-inner" style="min-height: 714.75px;">
                                <!-- Dashboard Headline -->
                                <div class="dashboard-headline">
                                    <h3>Dashboard</h3>
                                    <!-- Breadcrumbs -->
                                    <nav id="breadcrumbs" class="dark">
                                        <ul>
                                            <li><a href="{{ url('/') }}">Home</a></li>
                                            <li>Dashboard</li>
                                        </ul>
                                    </nav>
                                </div>
                                <!-- Fun Facts Container -->
                                <div class="fun-facts-container">
                                    <div class="fun-fact" data-fun-fact-color="#b81b7f">
                                        <div class="fun-fact-text">
                                            <span>Words Used</span>
                                            <h4> 1,720,479 <small>/ 10,000,000</small>
                                            </h4>
                                        </div>
                                        <div class="fun-fact-icon" style="background-color: rgba(184, 27, 127, 0.07);">
                                            <i class="icon-feather-trending-up" style="color: rgb(184, 27, 127);"></i>
                                        </div>
                                    </div>
                                    <div class="fun-fact" data-fun-fact-color="#36bd78">
                                        <div class="fun-fact-text">
                                            <span>Images Used</span>
                                            <h4> 2,611 <small>/ 5,000</small>
                                            </h4>
                                        </div>
                                        <div class="fun-fact-icon" style="background-color: rgba(54, 189, 120, 0.07);">
                                            <i class="icon-feather-bar-chart-2" style="color: rgb(54, 189, 120);"></i>
                                        </div>
                                    </div>
                                    <div class="fun-fact" data-fun-fact-color="#efa80f">
                                        <div class="fun-fact-text">
                                            <span>Speech to Text</span>
                                            <h4> 5 <small>/ 10</small>
                                            </h4>
                                        </div>
                                        <div class="fun-fact-icon" style="background-color: rgba(239, 168, 15, 0.07);">
                                            <i class="icon-feather-headphones" style="color: rgb(239, 168, 15);"></i>
                                        </div>
                                    </div>
                                </div>
                                <!-- Dashboard Box -->
                                <div class="dashboard-box main-box-in-row">
                                    <div class="headline">
                                        <h3><i class="icon-feather-bar-chart-2"></i> Word used this month</h3>
                                    </div>
                                    <div class="content">
                                        <!-- Chart -->
                                        <div class="chart">
                                            <div style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"
                                                                                              class="chartjs-size-monitor">
                                                <div class="chartjs-size-monitor-expand"
                                                                                                  style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                                    <div
                                                                                                      style="position:absolute;width:1000000px;height:1000000px;left:0;top:0">
                                                    </div>
                                                </div>
                                                <div class="chartjs-size-monitor-shrink"
                                                                                                  style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                                    <div style="position:absolute;width:200%;height:200%;left:0; top:0">
                                                    </div>
                                                </div>
                                            </div>
                                            <canvas id="chart" style="display: block; height: 154px; width: 344px;"
                                                                                              class="chartjs-render-monitor"
                                                                                              width="344"
                                                                                              height="154"></canvas>
                                        </div>
                                    </div>
                                </div>
                                <!-- Dashboard Box / End -->
                                <!-- Footer -->
                                <div class="dashboard-footer-spacer" style="padding-top: 178.5px;"></div>
                                <div class="small-footer margin-top-15">
                                    <div class="footer-copyright">
                                        <span>
                                            Copyright © {{ date('Y') }} All right reserved
                                        </span>
                                        |
                                        <span>Tiago França</span>
                                        |
                                        <span>Design by Bylancer</span>
                                    </div>
                                    <ul class="footer-social-links">
                                        <li><a href="https://www.facebook.com/" target="_blank" rel="nofollow"><i
                                                                                                  class="fa fa-facebook"></i></a>
                                        </li>
                                        <li><a href="https://www.twitter.com/" target="_blank" rel="nofollow"><i
                                                                                                  class="fa fa-twitter"></i></a>
                                        </li>
                                        <li><a href="https://instagram.com" target="_blank" rel="nofollow"><i
                                                                                                  class="fa fa-instagram"></i></a>
                                        </li>
                                        <li><a href="https://www.linkedin.com/" target="_blank" rel="nofollow"><i
                                                                                                  class="fa fa-linkedin"></i></a>
                                        </li>
                                        <li><a href="https://pinterest.com/" target="_blank" rel="nofollow"><i
                                                                                                  class="fa fa-pinterest"></i></a>
                                        </li>
                                        <li><a href="https://www.youtube.com/" target="_blank" rel="nofollow"><i
                                                                                                  class="fa fa-youtube"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Wrapper / End -->
        <script>
            $(document).ready(function () {
                $("#header-container").removeClass('transparent-header').addClass('dashboard-header sticky');
                $('.header-icon').removeClass('d-none');
            });

            /* THIS PORTION OF CODE IS ONLY EXECUTED WHEN THE USER THE LANGUAGE(CLIENT-SIDE) */
            $(function () {
                $('.language-switcher').on('click', '.dropdown-menu li', function (e) {
                    e.preventDefault();
                    var lang = $(this).data('lang');
                    if (lang != null) {
                        var res = lang.substr(0, 2);
                        $('#selected_lang').html(res);
                        $.cookie('Quick_lang', lang, { path: '/' });
                        location.reload();
                    }
                });
            });
        </script>
        <script>
            var session_uname = "demo";
            var session_uid = "1";
            var session_img = "812145019.jpg";
            // Language Var
            var LANG_ERROR_TRY_AGAIN = "Error: Please try again.";
            var LANG_LOGGED_IN_SUCCESS = "Logged in successfully. Redirecting...";
            var LANG_ERROR = "Error";
            var LANG_CANCEL = "Cancel";
            var LANG_DELETED = "Deleted";
            var LANG_ARE_YOU_SURE = "Are you sure?";
            var LANG_YOU_WANT_DELETE = "You want to delete this job";
            var LANG_YES_DELETE = "Yes, delete it";
            var LANG_PROJECT_CLOSED = "Project has been closed";
            var LANG_PROJECT_DELETED = "Project has been deleted";
            var LANG_RESUME_DELETED = "Resume Deleted.";
            var LANG_EXPERIENCE_DELETED = "Experience Deleted.";
            var LANG_COMPANY_DELETED = "Company Deleted.";
            var LANG_SHOW = "Show";
            var LANG_HIDE = "Hide";
            var LANG_HIDDEN = "Hidden";
            var LANG_TYPE_A_MESSAGE = "Type a message";
            var LANG_ADD_FILES_TEXT = "Add files to the upload queue and click the start button.";
            var LANG_ENABLE_CHAT_YOURSELF = "Could not able to chat yourself.";
            var LANG_JUST_NOW = "Just now";
            var LANG_PREVIEW = "Preview";
            var LANG_SEND = "Send";
            var LANG_FILENAME = "Filename";
            var LANG_STATUS = "Status";
            var LANG_SIZE = "Size";
            var LANG_DRAG_FILES_HERE = "Drag files here";
            var LANG_STOP_UPLOAD = "Stop Upload";
            var LANG_ADD_FILES = "Add files";
            var LANG_CHATS = "Chats";
            var LANG_NO_MSG_FOUND = "No message found";
            var LANG_ONLINE = "Online";
            var LANG_OFFLINE = "Offline";
            var LANG_TYPING = "Typing...";
            var LANG_GOT_MESSAGE = "You got a message";
            var LANG_COPIED_SUCCESSFULLY = "Copied successfully.";
            var DEVELOPER_CREDIT = 1;
            var LIVE_CHAT = 1;

            if ($("body").hasClass("rtl")) {
                var rtl = true;
            } else {
                var rtl = false;
            }
        </script>
        <!-- Scripts -->
        <script src="{{ url('/') }}/dashboard-assets/js/chosen.min.js"></script>
        <script src="{{ url('/') }}/dashboard-assets/js/jquery.lazyload.min.js"></script>
        <script src="{{ url('/') }}/dashboard-assets/js/tippy.all.min.js"></script>
        <script src="{{ url('/') }}/dashboard-assets/js/simplebar.min.js"></script>
        <script src="{{ url('/') }}/dashboard-assets/js/bootstrap-slider.min.js"></script>
        <script src="{{ url('/') }}/dashboard-assets/js/bootstrap-select.min.js"></script>
        <script src="{{ url('/') }}/dashboard-assets/js/snackbar.js"></script>
        <script src="{{ url('/') }}/dashboard-assets/js/counterup.min.js"></script>
        <script src="{{ url('/') }}/dashboard-assets/js/magnific-popup.min.js"></script>
        <script src="{{ url('/') }}/dashboard-assets/js/slick.min.js"></script>
        <script src="{{ url('/') }}/dashboard-assets/js/jquery.cookie.min.js"></script>
        <script src="{{ url('/') }}/dashboard-assets/js/custom.js"></script>
        <script src="{{ url('/') }}/dashboard-assets/js/chart.min.js"></script>
        <script>
            Chart.defaults.global.defaultFontFamily = "Nunito";
            Chart.defaults.global.defaultFontColor = '#888';
            Chart.defaults.global.defaultFontSize = '14';

            var ctx = document.getElementById('chart').getContext('2d');

            var chart = new Chart(ctx, {
                type: 'line',

                // The data for our dataset
                data: {
                    labels: ["01 Apr", "02 Apr", "03 Apr", "04 Apr", "05 Apr", "06 Apr", "07 Apr", "08 Apr", "09 Apr", "10 Apr", "11 Apr", "12 Apr", "13 Apr", "14 Apr", "15 Apr", "16 Apr", "17 Apr", "18 Apr", "19 Apr", "20 Apr", "21 Apr", "22 Apr", "23 Apr", "24 Apr", "25 Apr", "26 Apr", "27 Apr", "28 Apr", "29 Apr", "30 Apr"],
                    // Information about the dataset
                    datasets: [{
                        label: "Words Used",
                        backgroundColor: '#10a37f15',
                        borderColor: '#10a37f',
                        borderWidth: "3",
                        data: ["22069", "66799", "144960", "134233", "157532", "140549", "146710", "116944", "70601", "77957", "255183", "214260", "172682", 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
                        pointRadius: 5,
                        pointHoverRadius: 5,
                        pointHitRadius: 10,
                        pointBackgroundColor: "#fff",
                        pointHoverBackgroundColor: "#fff",
                        pointBorderWidth: "2",
                    }]
                },

                // Configuration options
                options: {
                    layout: {
                        padding: 10,
                    },
                    legend: { display: false },
                    title: { display: false },
                    scales: {
                        yAxes: [{
                            scaleLabel: {
                                display: false
                            },
                            gridLines: {
                                borderDash: [6, 10],
                                color: "#d8d8d8",
                                lineWidth: 1,
                            },
                            ticks: {
                                beginAtZero: true
                            }
                        }],
                        xAxes: [{
                            scaleLabel: { display: false },
                            gridLines: { display: false },
                        }],
                    },
                    tooltips: {
                        backgroundColor: '#333',
                        titleFontSize: 13,
                        titleFontColor: '#fff',
                        bodyFontColor: '#fff',
                        bodyFontSize: 13,
                        displayColors: false,
                        xPadding: 10,
                        yPadding: 10,
                        intersect: false
                    }
                },
            });

        </script>
        <!-- Footer / End -->

        <script>
            window.addEventListener('load', (event) => {
                let lastKnownScrollPosition = 0;
                let ticking = false;

                function toggleFixedHeader(isDown) {
                    // let headerContainer = document.querySelector('#header-container');
                    let headerContainer = document.querySelector('.dashboard-container .dashboard-sidebar');

                    if (!headerContainer) {
                        return;
                    }

                    if (isDown) {
                        headerContainer.classList.add('fixed-navbar');
                        return;
                    }

                    headerContainer.classList.remove('fixed-navbar');
                }

                function actionsPositionBased(scrollPos) {
                    let isDown = scrollPos > 120;

                    toggleFixedHeader(isDown);
                }

                actionsPositionBased(window.scrollY);

                document.addEventListener("scroll", (event) => {
                    lastKnownScrollPosition = window.scrollY;

                    if (!ticking) {
                        window.requestAnimationFrame(() => {
                            actionsPositionBased(lastKnownScrollPosition);
                            ticking = false;
                        });

                        ticking = true;
                    }
                });
            });
        </script>
    </body>
</html>
