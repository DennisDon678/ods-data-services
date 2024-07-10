<div class="modal fade" id="electricityModal" tabindex="-1" role="dialog" data-bs-backdrop="static" aria-hidden="true">
    <div class="row  justify-content-center mb-2 modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Pay For Electricity</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="col-12 col-lg-12 mb-2 border">
                <form action="" id="buyData">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 col-md-12 mb-2">
                                <div class="form-group mb-3 position-relative check-valid">
                                    <div class="input-group input-group-lg">
                                        <div class="form-floating">
                                            <select class="form-select border-0" id="cable" name="cable_id"
                                                required="">
                                                <option value="">Choose Your Disco...</option>
                                                <option value="1">Ikeja Electric</option>

                                                <option value="2">Eko Electric</option>

                                                <option value="3">Abuja Electric</option>

                                                <option value="4">Kano Electric</option>

                                                <option value="5">Enugu Electric</option>

                                                <option value="6">Port Harcourt Electric</option>

                                                <option value="7">Ibadan Electric</option>

                                                <option value="8">Kaduna Electric</option>

                                                <option value="9">Jos Electric</option>

                                                <option value="10">Benin Electric</option>

                                                <option value="11">Yola Electric</option>
                                            </select>
                                            <label for="network">Disco Name</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-12 mb-2">
                                <div class="form-group mb-3 position-relative check-valid">
                                    <div class="input-group input-group-lg">
                                        <div class="form-floating">
                                            <select class="form-select border-0" id="Cable_plan" required="">
                                                <option value="" id="">----------------------</option>
                                                <option value="Prepaid">Prepaid</option>

                                                <option value="Postpaid">Postpaid</option>
                                            </select>
                                            <label for="country2">Meter Type</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-2">
                            <div class="form-group mb-3 position-relative check-valid">
                                <div class="input-group input-group-lg">
                                    <div class="form-floating">
                                        <input type="text" placeholder="9032431003" id="phone"
                                            name="mobile_number" required="" class="form-control border-start-0">
                                        <label>Meter Number</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- <div class="mb-2">
                            <button type="button" id="validateIUC" class="btn btn-warning">Validate IUC</button>
                        </div> --}}

                        <div class="mb-2">
                            <div class="form-group mb-3 position-relative check-valid">
                                <div class="input-group input-group-lg">
                                    <div class="form-floating">
                                        <input type="number" placeholder="100" required=""
                                            class="form-control border-start-0" id="amount" readonly>
                                        <label>Enter Amount (&#8358;)</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-2">
                            <div class="form-group mb-3 position-relative check-valid">
                                <div class="input-group input-group-lg">
                                    <div class="form-floating">
                                        <input type="number" placeholder="100" required=""
                                            class="form-control border-start-0" id="amount" readonly>
                                        <label>Customer Phone</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-2">
                            <div class="form-group mb-3 position-relative check-valid">
                                <div class="input-group input-group-lg">
                                    <div class="form-floating">
                                        <input type="number" placeholder="1234" id="pin" required=""
                                            class="form-control border-start-0">
                                        <label>Enter Your Pin</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="submit" value="Buy" required=""
                            class=" border-start-0 btn btn-primary mb-2">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="/sweetalert%402.1.2/dist/sweetalert.min.js"></script>
<script src="/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
    crossorigin="anonymous"></script>
<script>

</script>
