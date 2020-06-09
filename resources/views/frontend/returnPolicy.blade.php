@extends('layouts.frontend')
@section('front')
    <section class="gry-bg py-4">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="p-4 bg-white">
                        <p></p>
                        <div id="full-help-page" style="box-sizing: border-box;">
                            <div style="box-sizing: border-box;">
                                <div data-module="1801" data-title="" style="box-sizing: border-box;">
                                    <div class="help-content" style="box-sizing: border-box;">
                                        <div style="box-sizing: border-box;">
                                            <p>{!! $pri->return !!}</p>


                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <p></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop
