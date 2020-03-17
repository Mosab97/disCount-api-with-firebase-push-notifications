<?php
/**
 * Created by PhpStorm.
 * User: Samir
 * Date: 24/01/2019
 * Time: 15:40
 */
?>

<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">{{$title}}</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            @foreach($breadcrumb as $item => $value)
                @if ($loop->last)
                    <li class="breadcrumb-item active">{{$item}}</li>
                @else
                    <li class="breadcrumb-item"><a href="{{$value}}">{{$item}}</a></li>
                @endif
            @endforeach
        </ol>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
