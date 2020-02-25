@extends('layouts.user')

@section('content')

    <div class="row">
        <div class="col-lg-6 col-md-6">
            <div class="upload my-3">
                <div class="card">
                    <div class="card-header">
                        <p class="text-uppercase d-inline font-weight-bold text-primary">start here </p><span class="small"> The first 3 images are free!</span>
                    </div>
                    <div class="card-body">
                        <div class="upload-btn text-center">
                            <a class="text-capitalize btn btn-primary btn-lg" href="{{route('user.new-order.index')}}">start uploading</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="contact-us py-3">
                <div class="card">
                    <div class="card-header">
                        <p class="text-uppercase d-inline font-weight-bold text-primary">contact us </p><span class="small"> Give us a call!</span>
                    </div>
                    <div class="card-body">
                        <p><b>Editesy</b> - <i class="small">Image Editing Company</i></p>
                        <p class="font-weight-light">29, Kaderabad Housing <br> Dhaka-1207 </br>+1 (530) 988 5841</p>

                    </div>
                </div>
            </div>

            <div class="faq py-3">
                <div class="card">
                    <div class="card-header">
                        <p class="text-uppercase d-inline font-weight-bold text-primary">FAQ </p><span class="small"> Here are some of the most popular questions. And we also provide a <a class="text-primary text-15" href=""><b>user manual</b></a>.</span>
                    </div>
                    <div class="card-body">


                        <div id="accordion" class="panel-group">
                            <div class="panel">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a href="#panelBodyFirst" class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion">&nbsp;&nbsp;What is Editesy?</a>
                                    </h4>
                                </div>
                                <div id="panelBodyFirst" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                            cillum dolore eu fugiat nulla pariatur.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="panel">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a href="#panelBodySecond" class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion">&nbsp;&nbsp;How can i create an account?</a>
                                    </h4>
                                </div>
                                <div id="panelBodySecond" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                            cillum dolore eu fugiat nulla pariatur.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a href="#panelBodyThird" class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion">&nbsp;&nbsp;How does it work?</a>
                                    </h4>
                                </div>
                                <div id="panelBodyThird" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                            cillum dolore eu fugiat nulla pariatur.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a href="#panelBodyfourth" class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion">&nbsp;&nbsp;How can i create an account?</a>
                                    </h4>
                                </div>
                                <div id="panelBodyfourth" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                            cillum dolore eu fugiat nulla pariatur.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a href="#panelBodyEight" class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion">&nbsp;&nbsp;How can i log in to my private account?</a>
                                    </h4>
                                </div>
                                <div id="panelBodyEight" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                            cillum dolore eu fugiat nulla pariatur.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a href="#panelBodyFive" class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion">&nbsp;&nbsp;I am logged in. What do i do next??</a>
                                    </h4>
                                </div>
                                <div id="panelBodyFive" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                            cillum dolore eu fugiat nulla pariatur.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a href="#panelBodySix" class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion">&nbsp;&nbsp;I would like to put in a new order. How does it work?</a>
                                    </h4>
                                </div>
                                <div id="panelBodySix" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                            cillum dolore eu fugiat nulla pariatur.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a href="#panelBodySeven" class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion">&nbsp;&nbsp;How can i paypal payment for your services?</a>
                                    </h4>
                                </div>
                                <div id="panelBodySeven" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                            cillum dolore eu fugiat nulla pariatur.</p>
                                    </div>
                                </div>
                            </div>
                        </div>




                    </div>
                </div>
            </div>

        </div>
        <div class="col-lg-6 col-md-6">
            <div class="video py-3">
                <div class="card">
                    <div class="card-body">
                        <iframe width="100%" height="315" src="https://www.youtube.com/embed/Bey4XXJAqS8?controls=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
            </div>

            <div class="order">
                <div class="upload my-3">
                    <div class="card">
                        <div class="card-header">
                            <p class="text-uppercase d-inline font-weight-bold text-primary">your orders</p><span class="small"> Your most recent orders!</span>
                        </div>
                        <div class="card-body">
                            <table class="table table-hover">
                                <tr>
                                    <th>#</th>
                                    <th>Orders</th>
                                    <th>Orders date</th>
                                    <th>Photes</th>
                                    <th>Orders status</th>
                                    <th>Action</th>
                                </tr>

                                <tr>
                                    <td>1</td>
                                    <td>asdfa</td>
                                    <td>asdfasdf</td>
                                    <td>asdfasd</td>
                                    <td>asdfsd</td>
                                    <td>completed</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


        </div>

    </div>

@endsection