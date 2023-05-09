<!-- Footer -->
<footer class="text-center text-white main-footer" style="background-color: #1f76bd">
    <!-- Grid container -->
    <div class="container">
        <!-- Section: Links -->
        <section class="mt-5">
            <!-- Grid row-->
            <div class="row text-center d-flex justify-content-center" style="padding-top: 2%;">
                <!-- Grid column -->
                <div class="col-md-1">
                    <h6 class="text-uppercase font-weight-bold">
                        <a href="{{route('front.about')}}" class="text-white">About us</a>
                    </h6>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-1">
                    <h6 class="text-uppercase font-weight-bold">
                        <a class="" href="{{route('front.contact')}}">CONTACT</a>
                    </h6>
                </div>
                <div class="col-md-1">
                    <h6 class="text-uppercase font-weight-bold">
                        <a href="{{route('front.gallery')}}">gallery</a>
                    </h6>
                </div>
                <div class="col-md-4">
                  <a href="" class="text-white" style="margin-left: 2%;">
                     <i class="fa fa-facebook fa-2x" aria-hidden="true"></i>
                 </a>
                 <a href="" class="text-white" style="margin-left: 2%;">
                     <i class="fa fa-twitter fa-2x" aria-hidden="true"></i>
                 </a>
                 <a href="" class="text-white" style="margin-left: 2%;">
                     <i class="fa fa-instagram fa-2x" aria-hidden="true"></i>
                 </a>
                 <a href="" class="text-white" style="margin-left: 2%;">
                     <i class="fa fa-youtube fa-2x" aria-hidden="true"></i>
                 </a>
                </div>
                <!-- Grid column -->

            </div>
            <!-- Grid row-->
        </section>
        <!-- Section: Links -->

        <hr class="my-5" />
        <!-- Section: Social -->
        
        <!-- Section: Social -->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
        © 2020 Copyright:
        <a class="text-white" href="">KanyaUpharYojyna</a>
    </div>
    <!-- Copyright -->
</footer>
<!-- Footer -->
<!-- main-footer -->
<div class="modal fade" id="donateModal" tabindex="-1" role="dialog" aria-labelledby="donateModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="donateModalLabel">Registration</h4>
            </div>
            <div class="modal-body">
                <form class="form-donation">
                    <h3 class="title-style-1 text-center">Thank you for your donation <span class="title-under"></span>
                    </h3>
                    <div class="row">
                        <div class="form-group col-md-12 ">
                            <input type="text" class="form-control" id="amount" placeholder="AMOUNT(€)">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" name="firstName" placeholder="First name*">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" name="lastName" placeholder="Last name*">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" name="email" placeholder="Email*">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" name="phone" placeholder="Phone">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <input type="text" class="form-control" name="address" placeholder="Address">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <textarea cols="30" rows="4" class="form-control" name="note"
                                placeholder="Additional note"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <button type="submit" class="btn btn-primary pull-right"
                                name="donateNow">Registration</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@include('front::layouts.includes.partials.scripts')