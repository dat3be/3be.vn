<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/hethong/head2.php';?>
    <title>View Code | <?=$chinhapi['ten_web'];?></title>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/hethong/nav.php';?>
    <?php
   if ($chinhapi['status_code'] == 'OFF'){
        echo '<script type="text/javascript">if(!alert("Dịch vụ này hiện đang bảo trì!")){window.history.back().location.reload();}</script>';
   }
   ?>
 </head>
  <?php
    $check_id = antixss($_GET['id']);
    $api_checkid = $ketnoi->query("SELECT * FROM `khocode` WHERE `id` = '$check_id' AND `status`='ON' ")->fetch_array();
    if (!($api_checkid)) {
        header("Location: /ma-nguon");
        exit();
    } else {
        $id = antixss($_GET['id']);
        $api_code = $ketnoi->query("SELECT * FROM `khocode` WHERE `id` = '$id' AND `status`='ON'  ")->fetch_array();
        mysqli_query($ketnoi, "UPDATE `khocode` SET `view` = `view` + '1' WHERE `id` = '$id' ");
}
?>


<body id="kt_app_body" data-kt-app-layout="light-sidebar" data-kt-app-header-fixed="true"
    data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true"
    data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true"
    data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default">
    <!--begin::Theme mode setup on page load-->
    <script>var defaultThemeMode = "light"; var themeMode; if (document.documentElement) { if (document.documentElement.hasAttribute("data-bs-theme-mode")) { themeMode = document.documentElement.getAttribute("data-bs-theme-mode"); } else { if (localStorage.getItem("data-bs-theme") !== null) { themeMode = localStorage.getItem("data-bs-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-bs-theme", themeMode); }</script>
    <!--end::Theme mode setup on page load-->
    <!--begin::App-->
    <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
        <!--begin::Page-->
        <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
            <!--begin::Header-->

            <!--end::Header-->
            <!--begin::Wrapper-->
            <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
                <!--begin::Sidebar-->
                <?php require $_SERVER['DOCUMENT_ROOT'].'/hethong/sider.php';?>
         
            </div>
            <!--end::Sidebar-->
            <!--begin::Main-->
            <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                <!--begin::Content wrapper-->
                <div class="d-flex flex-column flex-column-fluid">
                    <!--begin::Toolbar-->
                    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
                        <!--begin::Toolbar container-->
                            <!--begin::Page title-->
                                <!--begin::Title-->
                                <!--end::Title-->
                                <!--begin::Breadcrumb-->
                                    <!--begin::Item-->
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <!--end::Item-->
                                </ul>
                                <!--end::Breadcrumb-->
                            <!--end::Page title-->
                            <!--begin::Actions-->
                            <div class="d-flex align-items-center gap-2 gap-lg-3">
                                <!--begin::Filter menu-->
                                <!--end::Primary button-->
                            </div>
                            <!--end::Actions-->
                        </div>
                        <!--end::Toolbar container-->
                    </div>
                    <!--end::Toolbar-->
        </div>   <div class="content-page rtl-page">
    <div class="container-fluid">
<style>

*,:after,:before {
    border: 0 solid #e5e7eb;
    box-sizing: border-box
}

:after,:before {
    --tw-content: ""
}

:host,html {
    -webkit-text-size-adjust: 100%;
    font-feature-settings: normal;
    -webkit-tap-highlight-color: transparent;
    font-family: ui-sans-serif,system-ui,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;
    font-variation-settings: normal;
    line-height: 1.5;
    tab-size: 4
}

body {
    line-height: inherit
}

hr {
    border-top-width: 1px;
    color: inherit;
    height: 0
}

abbr:where([title]) {
    -webkit-text-decoration: underline dotted;
    text-decoration: underline dotted
}

h1,h2,h3,h4,h5,h6 {
    font-size: inherit;
    font-weight: inherit
}

a {
    color: inherit;
    text-decoration: inherit
}

b,strong {
    font-weight: bolder
}

code,kbd,pre,samp {
    font-feature-settings: normal;
    font-family: ui-monospace,SFMono-Regular,Menlo,Monaco,Consolas,Liberation Mono,Courier New,monospace;
    font-size: 1em;
    font-variation-settings: normal
}

small {
    font-size: 80%
}

sub,sup {
    font-size: 75%;
    line-height: 0;
    position: relative;
    vertical-align: initial
}

sub {
    bottom: -.25em
}

sup {
    top: -.5em
}

table {
    border-collapse: collapse;
    border-color: inherit;
    text-indent: 0
}

button,input,optgroup,select,textarea {
    font-feature-settings: inherit;
    color: inherit;
    font-family: inherit;
    font-size: 100%;
    font-variation-settings: inherit;
    font-weight: inherit;
    letter-spacing: inherit;
    line-height: inherit;
    margin: 0;
    padding: 0
}

button,select {
    text-transform: none
}

button,input:where([type=button]),input:where([type=reset]),input:where([type=submit]) {
    -webkit-appearance: button;
    background-color: initial;
    background-image: none
}

:-moz-focusring {
    outline: auto
}

:-moz-ui-invalid {
    box-shadow: none
}

progress {
    vertical-align: initial
}

::-webkit-inner-spin-button,::-webkit-outer-spin-button {
    height: auto
}

[type=search] {
    -webkit-appearance: textfield;
    outline-offset: -2px
}

::-webkit-search-decoration {
    -webkit-appearance: none
}

::-webkit-file-upload-button {
    -webkit-appearance: button;
    font: inherit
}

summary {
    display: list-item
}

blockquote,dd,dl,figure,h1,h2,h3,h4,h5,h6,hr,p,pre {
    margin: 0
}

fieldset {
    margin: 0
}

fieldset,legend {
    padding: 0
}

menu,ol,ul {
    list-style: none;
    margin: 0;
    padding: 0
}

dialog {
    padding: 0
}

textarea {
    resize: vertical
}

input::placeholder,textarea::placeholder {
    color: #9ca3af;
    opacity: 1
}

[role=button],button {
    cursor: pointer
}

:disabled {
    cursor: default
}

audio,canvas,embed,iframe,img,object,svg,video {
    display: block;
    vertical-align: middle
}

img,video {
    height: auto;
    max-width: 100%
}

[hidden] {
    display: none
}

*,::backdrop,:after,:before {
    --tw-border-spacing-x: 0;
    --tw-border-spacing-y: 0;
    --tw-translate-x: 0;
    --tw-translate-y: 0;
    --tw-rotate: 0;
    --tw-skew-x: 0;
    --tw-skew-y: 0;
    --tw-scale-x: 1;
    --tw-scale-y: 1;
    --tw-pan-x: ;
    --tw-pan-y: ;
    --tw-pinch-zoom: ;
    --tw-scroll-snap-strictness: proximity;
    --tw-gradient-from-position: ;
    --tw-gradient-via-position: ;
    --tw-gradient-to-position: ;
    --tw-ordinal: ;
    --tw-slashed-zero: ;
    --tw-numeric-figure: ;
    --tw-numeric-spacing: ;
    --tw-numeric-fraction: ;
    --tw-ring-inset: ;
    --tw-ring-offset-width: 0px;
    --tw-ring-offset-color: #fff;
    --tw-ring-color: #3b82f680;
    --tw-ring-offset-shadow: 0 0 #0000;
    --tw-ring-shadow: 0 0 #0000;
    --tw-shadow: 0 0 #0000;
    --tw-shadow-colored: 0 0 #0000;
    --tw-blur: ;
    --tw-brightness: ;
    --tw-contrast: ;
    --tw-grayscale: ;
    --tw-hue-rotate: ;
    --tw-invert: ;
    --tw-saturate: ;
    --tw-sepia: ;
    --tw-drop-shadow: ;
    --tw-backdrop-blur: ;
    --tw-backdrop-brightness: ;
    --tw-backdrop-contrast: ;
    --tw-backdrop-grayscale: ;
    --tw-backdrop-hue-rotate: ;
    --tw-backdrop-invert: ;
    --tw-backdrop-opacity: ;
    --tw-backdrop-saturate: ;
    --tw-backdrop-sepia: ;
    --tw-contain-size: ;
    --tw-contain-layout: ;
    --tw-contain-paint: ;
    --tw-contain-style:
}

.container {
    width: 100%
}

@media (min-width: 640px) {
    .container {
        max-width:640px
    }
}

@media (min-width: 768px) {
    .container {
        max-width:768px
    }
}

@media (min-width: 1024px) {
    .container {
        max-width:1024px
    }
}

@media (min-width: 1280px) {
    .container {
        max-width:1280px
    }
}

@media (min-width: 1536px) {
    .container {
        max-width:1536px
    }
}

.visible {
    visibility: visible
}

.fixed {
    position: fixed
}

.absolute {
    position: absolute
}

.relative {
    position: relative
}

.sticky {
    position: sticky
}

.bottom-0 {
    bottom: 0
}

.left-0 {
    left: 0
}

.left-\[-1\.9px\] {
    left: -1.9px
}

.left-\[1\.4px\] {
    left: 1.4px
}

.left-\[6px\] {
    left: 6px
}

.right-0 {
    right: 0
}

.top-0 {
    top: 0
}

.top-1\/2 {
    top: 50%
}

.top-\[-10px\] {
    top: -10px
}

.top-\[1px\] {
    top: 1px
}

.z-10 {
    z-index: 10
}

.z-50 {
    z-index: 50
}

.col-span-12 {
    grid-column: span 12/span 12;
}

.col-span-5 {
    grid-column: span 5/span 5
}

.col-span-7 {
    grid-column: span 7/span 7
}

.m-4 {
    margin: 1rem
}

.-mx-3 {
    margin-left: -.75rem;
    margin-right: -.75rem
}

.-mx-6 {
    margin-left: -1.5rem;
    margin-right: -1.5rem
}

.mx-auto {
    margin-left: auto;
    margin-right: auto;
}

.my-1 {
    margin-bottom: .25rem;
    margin-top: .25rem
}

.my-4 {
    margin-bottom: 1rem;
    margin-top: 1rem
}

.-mr-1 {
    margin-right: -.25rem
}

.mb-1 {
    margin-bottom: .25rem
}

.mb-2 {
    margin-bottom: .5rem
}

.mb-3 {
    margin-bottom: .75rem
}

.mb-4 {
    margin-bottom: 1rem
}

.mb-5 {
    margin-bottom: 1.25rem
}

.mb-6 {
    margin-bottom: 1.5rem
}

.me-2 {
    margin-inline-end:.5rem}

.ml-0 {
    margin-left: 0
}

.ml-1\.5 {
    margin-left: .375rem
}

.ml-2 {
    margin-left: .5rem
}

.ml-auto {
    margin-left: auto
}

.mr-1 {
    margin-right: .25rem
}

.mr-2 {
    margin-right: .5rem
}

.mt-1 {
    margin-top: .25rem
}

.mt-12 {
    margin-top: 3rem
}

.mt-2 {
    margin-top: .5rem
}

.mt-4 {
    margin-top: 1rem
}

.mt-5 {
    margin-top: 1.25rem
}

.mt-6 {
    margin-top: 1.5rem
}

.block {
    display: block
}

.inline-block {
    display: inline-block
}

.flex {
    display: flex
}

.inline-flex {
    display: inline-flex
}

.grid {
    display: grid
}

.hidden {
    display: none
}

.h-10 {
    height: 2.5rem
}

.h-12 {
    height: 3rem
}

.h-4 {
    height: 1rem
}

.h-5 {
    height: 1.25rem
}

.h-9 {
    height: 2.25rem
}

.h-\[110px\] {
    height: 110px
}

.h-full {
    height: 100%
}

.h-screen {
    height: 100vh
}

.min-h-screen {
    min-height: 100vh
}

.w-5 {
    width: 1.25rem
}

.w-56 {
    width: 14rem
}

.w-64 {
    width: 16rem
}

.w-9 {
    width: 2.25rem
}

.w-\[3\.7rem\] {
    width: 3.7rem
}

.w-\[70\%\] {
    width: 70%
}

.w-full {
    width: 100%
}

.w-max {
    width: max-content
}

.max-w-7xl {
    max-width: 80rem
}

.max-w-md {
    max-width: 28rem
}

.flex-1 {
    flex: 1 1
}

.origin-top-right {
    transform-origin: top right
}

.-translate-y-1\/2 {
    --tw-translate-y: -50%;
    transform: translate(var(--tw-translate-x),var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))
}

.cursor-pointer {
    cursor: pointer
}

.resize {
    resize: both
}

.grid-cols-1 {
    grid-template-columns: repeat(1,minmax(0,1fr))
}

.grid-cols-12 {
    grid-template-columns: repeat(12,minmax(0,1fr));
}

.grid-cols-2 {
    grid-template-columns: repeat(2,minmax(0,1fr))
}

.grid-cols-6 {
    grid-template-columns: repeat(6,minmax(0,1fr))
}

.flex-col {
    flex-direction: column
}

.flex-wrap {
    flex-wrap: wrap
}

.items-center {
    align-items: center
}

.justify-center {
    justify-content: center
}

.justify-between {
    justify-content: space-between
}

.gap-0 {
    gap: 0
}

.gap-3 {
    gap: .75rem
}

.gap-4 {
    gap: 1rem;
}

.gap-x-4 {
    column-gap: 1rem
}

.gap-y-2 {
    row-gap: .5rem
}

.space-x-4>:not([hidden])~:not([hidden]) {
    --tw-space-x-reverse: 0;
    margin-left: calc(1rem*(1 - var(--tw-space-x-reverse)));
    margin-right: calc(1rem*var(--tw-space-x-reverse))
}

.space-y-2>:not([hidden])~:not([hidden]) {
    --tw-space-y-reverse: 0;
    margin-bottom: calc(.5rem*var(--tw-space-y-reverse));
    margin-top: calc(.5rem*(1 - var(--tw-space-y-reverse)))
}

.space-y-3>:not([hidden])~:not([hidden]) {
    --tw-space-y-reverse: 0;
    margin-bottom: calc(.75rem*var(--tw-space-y-reverse));
    margin-top: calc(.75rem*(1 - var(--tw-space-y-reverse)))
}

.space-y-4>:not([hidden])~:not([hidden]) {
    --tw-space-y-reverse: 0;
    margin-bottom: calc(1rem*var(--tw-space-y-reverse));
    margin-top: calc(1rem*(1 - var(--tw-space-y-reverse)))
}

.divide-y>:not([hidden])~:not([hidden]) {
    --tw-divide-y-reverse: 0;
    border-bottom-width: calc(1px*var(--tw-divide-y-reverse));
    border-top-width: calc(1px*(1 - var(--tw-divide-y-reverse)))
}

.divide-gray-100>:not([hidden])~:not([hidden]) {
    --tw-divide-opacity: 1;
    border-color: rgb(243 244 246/var(--tw-divide-opacity))
}

.overflow-x-auto {
    overflow-x: auto
}

.truncate {
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap
}

.rounded {
    border-radius: .25rem
}

.rounded-full {
    border-radius: 9999px
}

.rounded-lg {
    border-radius: .5rem;
}

.rounded-md {
    border-radius: .375rem
}

.rounded-none {
    border-radius: 0
}

.rounded-t-lg {
    border-top-left-radius: .5rem;
    border-top-right-radius: .5rem
}

.border {
    border-width: 1px
}

.border-b {
    border-bottom-width: 1px
}

.border-t {
    border-top-width: 1px
}

.border-gray-300 {
    --tw-border-opacity: 1;
    border-color: rgb(209 213 219/var(--tw-border-opacity))
}

.border-slate-100 {
    --tw-border-opacity: 1;
    border-color: rgb(241 245 249/var(--tw-border-opacity))
}

.bg-blue-500 {
    --tw-bg-opacity: 1;
    background-color: rgb(59 130 246/var(--tw-bg-opacity))
}

.bg-blue-600 {
    --tw-bg-opacity: 1;
    background-color: rgb(37 99 235/var(--tw-bg-opacity))
}

.bg-gray-100 {
    --tw-bg-opacity: 1;
    background-color: rgb(243 244 246/var(--tw-bg-opacity))
}

.bg-gray-300 {
    --tw-bg-opacity: 1;
    background-color: rgb(209 213 219/var(--tw-bg-opacity))
}

.bg-gray-700 {
    --tw-bg-opacity: 1;
    background-color: rgb(55 65 81/var(--tw-bg-opacity))
}

.bg-gray-800 {
    --tw-bg-opacity: 1;
    background-color: rgb(31 41 55/var(--tw-bg-opacity))
}

.bg-red-500 {
    --tw-bg-opacity: 1;
    background-color: rgb(239 68 68/var(--tw-bg-opacity))
}

.bg-sky-950 {
    --tw-bg-opacity: 1;
    background-color: rgb(8 47 73/var(--tw-bg-opacity))
}

.bg-white {
    --tw-bg-opacity: 1;
    background-color: rgb(255 255 255/var(--tw-bg-opacity))
}

.bg-gradient-to-r {
    background-image: linear-gradient(to right,var(--tw-gradient-stops))
}

.from-cyan-500 {
    --tw-gradient-from: #06b6d4 var(--tw-gradient-from-position);
    --tw-gradient-to: #06b6d400 var(--tw-gradient-to-position);
    --tw-gradient-stops: var(--tw-gradient-from),var(--tw-gradient-to)
}

.to-indigo-500 {
    --tw-gradient-to: #6366f1 var(--tw-gradient-to-position)
}

.bg-clip-text {
    -webkit-background-clip: text;
    background-clip: text
}

.stroke-red-500 {
    stroke: #ef4444
}

.object-cover {
    object-fit: cover
}

.object-fill {
    object-fit: fill
}

.p-3 {
    padding: .75rem
}

.p-4 {
    padding: 1rem;
}

.p-6 {
    padding: 1.5rem
}

.p-8 {
    padding: 2rem
}

.px-1 {
    padding-left: .25rem;
    padding-right: .25rem
}

.px-2 {
    padding-left: .5rem;
    padding-right: .5rem
}

.px-3 {
    padding-left: .75rem;
    padding-right: .75rem
}

.px-4 {
    padding-left: 1rem;
    padding-right: 1rem
}

.px-6 {
    padding-left: 1.5rem;
    padding-right: 1.5rem
}

.py-1 {
    padding-bottom: .25rem;
    padding-top: .25rem
}

.py-2 {
    padding-bottom: .5rem;
    padding-top: .5rem
}

.py-3 {
    padding-bottom: .75rem;
    padding-top: .75rem
}

.pb-32 {
    padding-bottom: 8rem
}

.pb-4 {
    padding-bottom: 1rem
}

.pb-5 {
    padding-bottom: 1.25rem
}

.pb-56 {
    padding-bottom: 14rem
}

.pb-6 {
    padding-bottom: 1.5rem
}

.pb-64 {
    padding-bottom: 16rem
}

.pb-8 {
    padding-bottom: 2rem;
}

.pl-3 {
    padding-left: .75rem
}

.pt-24 {
    padding-top: 6rem
}

.pt-32 {
    padding-top: 8rem
}

.pt-5 {
    padding-top: 1.25rem
}

.pt-6 {
    padding-top: 1.5rem;
}

.text-left {
    text-align: left
}

.text-center {
    text-align: center
}

.font-mono {
    font-family: ui-monospace,SFMono-Regular,Menlo,Monaco,Consolas,Liberation Mono,Courier New,monospace
}

.text-2xl {
    font-size: 1.5rem;
    line-height: 2rem
}

.text-3xl {
    font-size: 1.875rem;
    line-height: 2.25rem
}

.text-5xl {
    font-size: 3rem;
    line-height: 1
}

.text-\[10px\] {
    font-size: 10px
}

.text-base {
    font-size: 1rem;
    line-height: 1.5rem
}

.text-lg {
    font-size: 1.125rem;
    line-height: 1.75rem
}

.text-sm {
    font-size: .875rem;
    line-height: 1.25rem
}

.text-xl {
    font-size: 1.25rem;
    line-height: 1.75rem
}

.text-xs {
    font-size: .75rem;
    line-height: 1rem
}

.font-bold {
    font-weight: 700
}

.font-medium {
    font-weight: 500
}

.font-semibold {
    font-weight: 600
}

.leading-6 {
    line-height: 1.5rem
}

.leading-tight {
    line-height: 1.25
}

.text-blue-500 {
    --tw-text-opacity: 1;
    color: rgb(59 130 246/var(--tw-text-opacity))
}

.text-blue-900 {
    --tw-text-opacity: 1;
    color: rgb(30 58 138/var(--tw-text-opacity))
}

.text-gray-400 {
    --tw-text-opacity: 1;
    color: rgb(156 163 175/var(--tw-text-opacity))
}

.text-gray-600 {
    --tw-text-opacity: 1;
    color: rgb(75 85 99/var(--tw-text-opacity))
}

.text-gray-700 {
    --tw-text-opacity: 1;
    color: rgb(55 65 81/var(--tw-text-opacity))
}

.text-gray-800 {
    --tw-text-opacity: 1;
    color: rgb(31 41 55/var(--tw-text-opacity))
}

.text-gray-900 {
    --tw-text-opacity: 1;
    color: rgb(17 24 39/var(--tw-text-opacity))
}

.text-green-500 {
    --tw-text-opacity: 1;
    color: rgb(34 197 94/var(--tw-text-opacity))
}

.text-red-500 {
    --tw-text-opacity: 1;
    color: rgb(239 68 68/var(--tw-text-opacity))
}

.text-red-600 {
    --tw-text-opacity: 1;
    color: rgb(220 38 38/var(--tw-text-opacity))
}

.text-slate-900 {
    --tw-text-opacity: 1;
    color: rgb(15 23 42/var(--tw-text-opacity))
}

.text-white {
    --tw-text-opacity: 1;
    color: rgb(255 255 255/var(--tw-text-opacity))
}

.text-zinc-700 {
    --tw-text-opacity: 1;
    color: rgb(63 63 70/var(--tw-text-opacity))
}

.text-zinc-900 {
    --tw-text-opacity: 1;
    color: rgb(24 24 27/var(--tw-text-opacity))
}

.shadow {
    --tw-shadow: 0 1px 3px 0 #0000001a,0 1px 2px -1px #0000001a;
    --tw-shadow-colored: 0 1px 3px 0 var(--tw-shadow-color),0 1px 2px -1px var(--tw-shadow-color)
}

.shadow,.shadow-lg {
    box-shadow: 0 0 #0000,0 0 #0000,var(--tw-shadow);
    box-shadow: var(--tw-ring-offset-shadow,0 0 #0000),var(--tw-ring-shadow,0 0 #0000),var(--tw-shadow)
}

.shadow-lg {
    --tw-shadow: 0 10px 15px -3px #0000001a,0 4px 6px -4px #0000001a;
    --tw-shadow-colored: 0 10px 15px -3px var(--tw-shadow-color),0 4px 6px -4px var(--tw-shadow-color)
}

.shadow-md {
    --tw-shadow: 0 4px 6px -1px #0000001a,0 2px 4px -2px #0000001a;
    --tw-shadow-colored: 0 4px 6px -1px var(--tw-shadow-color),0 2px 4px -2px var(--tw-shadow-color)
}

.shadow-md,.shadow-sm {
    box-shadow: 0 0 #0000,0 0 #0000,var(--tw-shadow);
    box-shadow: var(--tw-ring-offset-shadow,0 0 #0000),var(--tw-ring-shadow,0 0 #0000),var(--tw-shadow);
}

.shadow-sm {
    --tw-shadow: 0 1px 2px 0 #0000000d;
    --tw-shadow-colored: 0 1px 2px 0 var(--tw-shadow-color)
}

.ring-1 {
    --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
    --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color);
    box-shadow: var(--tw-ring-offset-shadow),var(--tw-ring-shadow),0 0 #0000;
    box-shadow: var(--tw-ring-offset-shadow),var(--tw-ring-shadow),var(--tw-shadow,0 0 #0000)
}

.ring-black {
    --tw-ring-opacity: 1;
    --tw-ring-color: rgb(0 0 0/var(--tw-ring-opacity))
}

.ring-opacity-5 {
    --tw-ring-opacity: 0.05
}

.transition-colors {
    transition-duration: .15s;
    transition-property: color,background-color,border-color,text-decoration-color,fill,stroke;
    transition-timing-function: cubic-bezier(.4,0,.2,1)
}

body {
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    font-family: -apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Oxygen,Ubuntu,Cantarell,Fira Sans,Droid Sans,Helvetica Neue,sans-serif;
    margin: 0
}

.login-img {
    background-attachment: fixed;
    background-image: url(https://i.imgur.com/kKZmOQ5.jpeg);
    background-position: 50%;
    background-repeat: no-repeat;
    background-size: cover
}

.ws-font-extrabold {
    font-weight: 800
}

.dvr {
    background: linear-gradient(100deg,#ff424e,#fd820a)
}

.khanhdz {
    background-image: url(https://cdns.diongame.com/static/Wbt9g97I1bTcyMc.png);
    background-position: 100% 0;
    background-repeat: no-repeat
}

.intro-box {
    position: relative
}

.intro-box:after,.intro-box:before {
    animation: clippath 3s linear infinite;
    border: 3px solid #0000;
    border-image: linear-gradient(45deg,gold,#3a9140,#ff1493,#06f) 1;
    border-radius: 8px;
    bottom: -5px;
    content: "";
    left: -5px;
    position: absolute;
    right: -5px;
    top: -5px
}

@keyframes clippath {
    0% {
        clip-path: inset(0 0 0 0)
    }

    50% {
        clip-path: inset(10px 10px 10px 10px)
    }

    to {
        clip-path: inset(0 0 0 0)
    }
}

.page-content {
    padding: 15px 15px 2rem
}

.vien {
    border: 1.5px solid red;
    border-radius: 10px;
    -moz-border-radius: 24px;
    -webkit-border-radius: 20px
}

.custom-green-bg {
    background-color: #22c55e
}
/*dele dưới*/

:root {
    --swiper-theme-color: #007aff
}

:host {
    display: block;
    margin-left: auto;
    margin-right: auto;
    position: relative;
    z-index: 1
}

.swiper {
    display: block;
    list-style: none;
    margin-left: auto;
    margin-right: auto;
    overflow: hidden;
    padding: 0;
    position: relative;
    z-index: 1
}

.swiper-vertical>.swiper-wrapper {
    flex-direction: column
}

.swiper-wrapper {
    box-sizing: initial;
    display: flex;
    height: 100%;
    position: relative;
    transition-property: transform;
    transition-timing-function: ease;
    transition-timing-function: var(--swiper-wrapper-transition-timing-function,initial);
    width: 100%;
    z-index: 1
}

.swiper-android .swiper-slide,.swiper-ios .swiper-slide,.swiper-wrapper {
    transform: translateZ(0)
}

.swiper-horizontal {
    touch-action: pan-y
}

.swiper-vertical {
    touch-action: pan-x
}

.swiper-slide {
    display: block;
    flex-shrink: 0;
    height: 100%;
    position: relative;
    transition-property: transform;
    width: 100%
}

.swiper-slide-invisible-blank {
    visibility: hidden
}

.swiper-autoheight,.swiper-autoheight .swiper-slide {
    height: auto
}

.swiper-autoheight .swiper-wrapper {
    align-items: flex-start;
    transition-property: transform,height
}

.swiper-backface-hidden .swiper-slide {
    backface-visibility: hidden;
    transform: translateZ(0)
}

.swiper-3d.swiper-css-mode .swiper-wrapper {
    perspective: 1200px
}

.swiper-3d .swiper-wrapper {
    transform-style: preserve-3d
}

.swiper-3d {
    perspective: 1200px
}

.swiper-3d .swiper-cube-shadow,.swiper-3d .swiper-slide {
    transform-style: preserve-3d
}

.swiper-css-mode>.swiper-wrapper {
    -ms-overflow-style: none;
    overflow: auto;
    scrollbar-width: none
}

.swiper-css-mode>.swiper-wrapper::-webkit-scrollbar {
    display: none
}

.swiper-css-mode>.swiper-wrapper>.swiper-slide {
    scroll-snap-align: start start
}

.swiper-css-mode.swiper-horizontal>.swiper-wrapper {
    scroll-snap-type: x mandatory
}

.swiper-css-mode.swiper-vertical>.swiper-wrapper {
    scroll-snap-type: y mandatory
}

.swiper-css-mode.swiper-free-mode>.swiper-wrapper {
    scroll-snap-type: none
}

.swiper-css-mode.swiper-free-mode>.swiper-wrapper>.swiper-slide {
    scroll-snap-align: none
}

.swiper-css-mode.swiper-centered>.swiper-wrapper:before {
    content: "";
    flex-shrink: 0;
    order: 9999
}

.swiper-css-mode.swiper-centered>.swiper-wrapper>.swiper-slide {
    scroll-snap-align: center center;
    scroll-snap-stop:always}

.swiper-css-mode.swiper-centered.swiper-horizontal>.swiper-wrapper>.swiper-slide:first-child {
    margin-inline-start:var(--swiper-centered-offset-before)}

.swiper-css-mode.swiper-centered.swiper-horizontal>.swiper-wrapper: before {
    height:100%;
    min-height: 1px;
    width: var(--swiper-centered-offset-after)
}

.swiper-css-mode.swiper-centered.swiper-vertical>.swiper-wrapper>.swiper-slide:first-child {
    margin-block-start:var(--swiper-centered-offset-before)}

.swiper-css-mode.swiper-centered.swiper-vertical>.swiper-wrapper: before {
    height:var(--swiper-centered-offset-after);
    min-width: 1px;
    width: 100%
}

.swiper-3d .swiper-slide-shadow,.swiper-3d .swiper-slide-shadow-bottom,.swiper-3d .swiper-slide-shadow-left,.swiper-3d .swiper-slide-shadow-right,.swiper-3d .swiper-slide-shadow-top {
    height: 100%;
    left: 0;
    pointer-events: none;
    position: absolute;
    top: 0;
    width: 100%;
    z-index: 10
}

.swiper-3d .swiper-slide-shadow {
    background: #00000026
}

.swiper-3d .swiper-slide-shadow-left {
    background-image: linear-gradient(270deg,#00000080,#0000)
}

.swiper-3d .swiper-slide-shadow-right {
    background-image: linear-gradient(90deg,#00000080,#0000)
}

.swiper-3d .swiper-slide-shadow-top {
    background-image: linear-gradient(0deg,#00000080,#0000)
}

.swiper-3d .swiper-slide-shadow-bottom {
    background-image: linear-gradient(180deg,#00000080,#0000)
}

.swiper-lazy-preloader {
    border: 4px solid #007aff;
    border: 4px solid var(--swiper-preloader-color,var(--swiper-theme-color));
    border-radius: 50%;
    border-top: 4px solid #0000;
    box-sizing: border-box;
    height: 42px;
    left: 50%;
    margin-left: -21px;
    margin-top: -21px;
    position: absolute;
    top: 50%;
    transform-origin: 50%;
    width: 42px;
    z-index: 10
}

.swiper-watch-progress .swiper-slide-visible .swiper-lazy-preloader,.swiper:not(.swiper-watch-progress) .swiper-lazy-preloader {
    animation: swiper-preloader-spin 1s linear infinite
}

.swiper-lazy-preloader-white {
    --swiper-preloader-color: #fff
}

.swiper-lazy-preloader-black {
    --swiper-preloader-color: #000
}

@keyframes swiper-preloader-spin {
    0% {
        transform: rotate(0deg)
    }

    to {
        transform: rotate(1turn)
    }
}

.swiper-free-mode>.swiper-wrapper {
    margin: 0 auto;
    transition-timing-function: ease-out
}

:root {
    --swiper-navigation-size: 44px
}

.swiper-button-next,.swiper-button-prev {
    align-items: center;
    color: var(--swiper-theme-color);
    color: var(--swiper-navigation-color,var(--swiper-theme-color));
    cursor: pointer;
    display: flex;
    height: 44px;
    height: var(--swiper-navigation-size);
    justify-content: center;
    margin-top: -22px;
    margin-top: calc(0px - var(--swiper-navigation-size)/2);
    position: absolute;
    top: 50%;
    top: var(--swiper-navigation-top-offset,50%);
    width: 27px;
    width: calc(var(--swiper-navigation-size)/44*27);
    z-index: 10
}

.swiper-button-next.swiper-button-disabled,.swiper-button-prev.swiper-button-disabled {
    cursor: auto;
    opacity: .35;
    pointer-events: none
}

.swiper-button-next.swiper-button-hidden,.swiper-button-prev.swiper-button-hidden {
    cursor: auto;
    opacity: 0;
    pointer-events: none
}

.swiper-navigation-disabled .swiper-button-next,.swiper-navigation-disabled .swiper-button-prev {
    display: none!important
}

.swiper-button-next svg,.swiper-button-prev svg {
    height: 100%;
    object-fit: contain;
    transform-origin: center;
    width: 100%
}

.swiper-rtl .swiper-button-next svg,.swiper-rtl .swiper-button-prev svg {
    transform: rotate(180deg)
}

.swiper-button-prev,.swiper-rtl .swiper-button-next {
    left: 10px;
    left: var(--swiper-navigation-sides-offset,10px);
    right: auto
}

.swiper-button-lock {
    display: none
}

.swiper-button-next:after,.swiper-button-prev:after {
    font-family: swiper-icons;
    font-size: 44px;
    font-size: var(--swiper-navigation-size);
    font-variant: normal;
    letter-spacing: 0;
    line-height: 1;
    text-transform: none!important
}

.swiper-button-prev:after,.swiper-rtl .swiper-button-next:after {
    content: "prev"
}

.swiper-button-next,.swiper-rtl .swiper-button-prev {
    left: auto;
    right: 10px;
    right: var(--swiper-navigation-sides-offset,10px)
}

.swiper-button-next:after,.swiper-rtl .swiper-button-prev:after {
    content: "next"
}

.vanduc {
    background: linear-gradient(100deg,#ff424e,#fd820a)
}

.ducapi {
    background-image: url(https://cdns.diongame.com/static/Wbt9g97I1bTcyMc.png);
    background-position: 100% 0;
    background-repeat: no-repeat
}

</style>
<div class="container">
    <div class="row ">

        <!-- Left section with Swiper sliders -->
             <div class="col-md-6 col-xl-6 p-4 mt-4 bg-white shadow-md rounded-lg gap-4" style="  ">
                 
                <!-- Main Swiper -->
                <div style="position: relative; overflow: hidden;">
                    <div class="swiper mySwiper2" style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff;">
                        <div class="swiper-wrapper">
                            
                            <?php
                            $lines = explode("\n", $api_code['list_img']); 
                            if (!empty($lines)) {
                                foreach ($lines as $index => $line) {
                            ?>
                            <div class="swiper-slide" data-swiper-slide-index="<?= $index ?>" style="width: 349px; margin-right: 10px;">
                                <img class="w-full rounded-lg" src="<?= trim($line); ?>" alt="Slide <?= $index + 1 ?>">
                            </div>
                            <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
                
                <!-- Thumbnail Swiper -->
                <div class="swiper mySwiper mt-4">
                    <div class="swiper-wrapper">
                        <?php
                        foreach ($lines as $indexx => $lineducapi) {
                        ?>
                        <div class="swiper-slide" data-swiper-slide-index="<?= $indexx ?>" style="width: 50px; margin-right: 10px;">
                            <img class="rounded-lg w-30" src="<?= trim($lineducapi); ?>" alt="Thumbnail <?= $indexx + 1 ?>">
                        </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>

        <div class="col-md-6 col-xl-6 p-4 mt-4 bg-white shadow-md rounded-lg gap-4 ducapi " >
          <div class="my-4 grid grid-cols-6 gap-0">
    <div class="md:col-span-9 col-span-12">
        <div class="rounded vanduc">
            <div class="flex items-center justify-between px-3 py-1">
                <!-- Original Price Section -->
                <div>
                    <span class="text-white text-xs font-semibold">
                        GIÁ GỐC <i class="bx bxs-hot ws-relative ws-top-[0.8px]"></i>
                    </span>
                    <h2 class="text-white stroke-red-500 ws-font-extrabold text-2xl">
                      <?= tien($api_code['gia']); ?> <small class="relative top-[-10px] text-[10px]">đ</small>
                    </h2>
                </div>
 
                <!-- Discount Section -->
                <div>
                    <span class="text-white text-xs font-semibold">GIẢM               <?php 
if ($api_code['trangthai'] == 'ON') {
    $tiensale = $api_code['giam_gia'] / $api_code['gia'] * 100;
    echo $tiensale;
} else {
       $notsale = '0';
    echo $notsale;
}
?>
%</span>
                    <h2 class="text-white ws-font-extrabold text-2xl">
                                      <?php 
if ($api_code['trangthai'] == 'ON') {
    $tiensale = $api_code['gia'] - $api_code['giam_gia'] ;
    echo tien($tiensale);
} else {
    echo tien($api_code['gia']);
}
?>
 <small class="relative top-[-10px] text-[10px]">đ</small>
                    </h2>
                </div>
            </div>
        </div>
    </div>
</div>
  <h2 class="mb-2 text-xl font-bold"><?=$api_code['title'];?></h2>
            <h3 class="font-bold text-gray-900 mb-4">Thông tin chi tiết:</h3>
            <div class="text-gray-700">
                <p class="mb-2"><strong>Mã Code:</strong>     <?=$api_code['id'];?></p>
                <p class="mb-2"><strong>Lượt Xem:</strong>   <?=$api_code['view'];?></p>
                <p class="mb-2"><strong>Lượt Bán:</strong>     <?=$api_code['buy'];?></p>
                <p class="mb-2"><strong>Cập Nhật:</strong><td>    <?=ngay($row['create_date']);?></td></p>
                <p class="mb-2"><strong>Người Bán:</strong>  <?=$chinhapi['name_ad'];?></p>
                
                <input type="text" id="giftcode" class="btn btn-outline btn-outline-dashed btn-outline-primary btn-active-light-primary form-control mb-2"
                                                    placeholder="Nhập mã giftcode" />
                <button type="button" onclick="muangay()" class="bg-red-500 text-white px-4 py-2 rounded-lg mt-4 w-full">
                                                            
                                                            <span id="button1" class="input-dat">Mua ngay</span>
                                                            <span id="button2" class="input-dat"
                                                                style="display: none;">Đang xử lý...<span class="spinner-border spinner-border-sm align-middle ms-2"></span>
    </span>
                                                            </span>
                                                        </button>
                
            </div>
        </div>
<div class=" col-md-12 p-3 bg-white shadow-md rounded-lg mt-4 animated-border gap-4">
    <ul class="nav nav-tabs nav-line-tabs mb-5 fs-6">
    <li class="nav-item">
        <a class="nav-link active" data-bs-toggle="tab" href="#kt_tab_pane_1">Thông Tin</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-bs-toggle="tab" href="#kt_tab_pane_2">Demo</a>
    </li>
</ul>

<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="kt_tab_pane_1" role="tabpanel">
        <?=$api_code['noidung'];?>
    </div>
    <div class="tab-pane fade" id="kt_tab_pane_2" role="tabpanel">
        <?=$api_code['title'];?>
    </div>
</div>
        <script>
                        function muangay() {
                            const button1 = document.getElementById("button1");
                            const button2 = document.getElementById("button2");

                            button1.style.display = "none";
                            button2.style.display = "inline-block";
                            button2.disabled = true;

                            const username = "<?=$username?>";
                            const id_code = "<?=$id?>";
                            const giftcode = document.getElementById("giftcode").value;

                            // Hiển thị sweet alert với nội dung xác nhận mua code
                            Swal.fire({
                                title: 'Xác nhận mua code',
                                text: "Bạn có chắc chắn muốn mua code này?",
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Đồng ý',
                                cancelButtonText: 'Hủy bỏ'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    const xhr = new XMLHttpRequest();
                                    xhr.open("POST", "/ajax/manguon/xulymuacode");
                                    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                                    xhr.onload = function() {
                                        button1.style.display = "inline-block";
                                        button2.style.display = "none";
                                        button2.disabled = false;

                                        if (xhr.status === 200) {
                                            const response = JSON.parse(xhr.responseText);
                                            if (response.success) {
                                                cuteToast({
                                                    type: "success",
                                                    message: "Mua code thành công",
                                                    timer:2000
                                                }).then(function() {
                                                    // Tải lại trang sau khi nhấn OK
                                                     window.location.href = "/history-ma-nguon";
                                                });
                                            } else {
                                                cuteToast({
                                                    type: "error",
                                                    message: response.message,
                                                    timer:2000
                                                });
                                            }
                                        } else {
                                            cuteToast({
                                                type: "error",
                                                message: "Error: " + xhr.statusText,
                                                timer:2000
                                            });
                                        }
                                    };
                                    xhr.onerror = function() {
                                        button1.style.display = "inline-block";
                                        button2.style.display = "none";
                                        button2.disabled = false;

                                        cuteToast({
                                            icon: "error",
                                            text: "Error: " + xhr.statusText,
                                        });
                                    };
                                    xhr.send(
                                        "username=" + encodeURIComponent(username) +
                                        "&giftcode=" + encodeURIComponent(giftcode) +
                                        "&id_code=" + encodeURIComponent(id_code)
                                    );
                                } else {
                                    button1.style.display = "inline-block";
                                    button2.style.display = "none";
                                    button2.disabled = false;
                                }
                            });
                        }
                        
                        </script>
<style>
.animated-border {
    position: relative;
    padding: 10px;
    background: white;
    border: 3px solid; 
    border-image: linear-gradient(45deg, blue, red, purple, yellow) 1;
    animation: borderAnimation 5s linear infinite;
}

@keyframes borderAnimation {
    0% {
        border-image-source: linear-gradient(45deg, blue, red, purple, yellow);
    }
    50% {
        border-image-source: linear-gradient(45deg, yellow, blue, red, purple);
    }
    100% {
        border-image-source: linear-gradient(45deg, blue, red, purple, yellow);
    }
}
</style>

  </div>
</div>

    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
<script>
    var swiper = new Swiper(".mySwiper", {
        spaceBetween: 10,
        slidesPerView: 4,
        freeMode: true,
        watchSlidesProgress: true,
    });

    var swiper2 = new Swiper(".mySwiper2", {
        spaceBetween: 10,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        thumbs: {
            swiper: swiper,
        },
    });
</script>

    

<script>
                        function muangay() {
                            const button1 = document.getElementById("button1");
                            const button2 = document.getElementById("button2");

                            button1.style.display = "none";
                            button2.style.display = "inline-block";
                            button2.disabled = true;

                            const username = "<?=$username?>";
                            const id_code = "<?=$id?>";
                            const giftcode = document.getElementById("giftcode").value;

                            // Hiển thị sweet alert với nội dung xác nhận mua code
                            Swal.fire({
                                title: 'Xác nhận mua code',
                                text: "Bạn có chắc chắn muốn mua code này?",
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Đồng ý',
                                cancelButtonText: 'Hủy bỏ'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    const xhr = new XMLHttpRequest();
                                    xhr.open("POST", "/ajax/manguon/xulymuacode");
                                    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                                    xhr.onload = function() {
                                        button1.style.display = "inline-block";
                                        button2.style.display = "none";
                                        button2.disabled = false;

                                        if (xhr.status === 200) {
                                            const response = JSON.parse(xhr.responseText);
                                            if (response.success) {
                                                cuteToast({
                                                    type: "success",
                                                    message: "Mua code thành công",
                                                    timer:2000
                                                }).then(function() {
                                                    // Tải lại trang sau khi nhấn OK
                                                     window.location.href = "/history-ma-nguon";
                                                });
                                            } else {
                                                cuteToast({
                                                    type: "error",
                                                    message: response.message,
                                                    timer:2000
                                                });
                                            }
                                        } else {
                                            cuteToast({
                                                type: "error",
                                                message: "Error: " + xhr.statusText,
                                                timer:2000
                                            });
                                        }
                                    };
                                    xhr.onerror = function() {
                                        button1.style.display = "inline-block";
                                        button2.style.display = "none";
                                        button2.disabled = false;

                                        cuteToast({
                                            icon: "error",
                                            text: "Error: " + xhr.statusText,
                                        });
                                    };
                                    xhr.send(
                                        "username=" + encodeURIComponent(username) +
                                        "&giftcode=" + encodeURIComponent(giftcode) +
                                        "&id_code=" + encodeURIComponent(id_code)
                                    );
                                } else {
                                    button1.style.display = "inline-block";
                                    button2.style.display = "none";
                                    button2.disabled = false;
                                }
                            });
                        }
                        
                        </script>

<!-- Add the following JavaScript code -->
                    </br>
                    </br>
                    </div>
                    <?php require $_SERVER['DOCUMENT_ROOT'].'/hethong/foot.php';?>
                    <!--end::Content-->
                </div>
            <!--end:::Main-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Page-->
    </div>
