<div class="row">
    <!-- Transactions -->
    <div class="col-12 col-md-12 position-relative ">
        <div class="card border-0 overflow-hidden mb-4">
            <div class="card-header">
                <div class="row">
                    <div class="col-9">
                        <div class="row">
                            <div class="col-auto mb-2">
                                <i class="bi bi-shop h5 avatar avatar-40 bg-light-theme rounded"></i>
                            </div>
                            <div class="col align-self-center mb-2">
                                <h6 class="fw-medium mb-0">Airtime To Cash</h6>
                                <p class="text-secondary small">Pending Transactions</p>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="card-body px-4">
                <table class="table table-borderless">
                    <tbody class="">
                        @php
                            $trans = App\Models\Airtime_to_cash::orderby('created_at', 'DESC')->paginate(5);
                        @endphp

                        @forelse ($trans as $tran)
                            <tr class="">
                                <td>
                                    <div class="d-flex align-items-center p-4 border rounded">
                                        <div class="col-8 ps-0">
                                            <h6 class="mb-0 bold">{{ strtoupper('airtime to cash') }}</h6>
                                            <p class="text-secondary small">TRANSACTION
                                                {{ strtoupper($tran->status) }}</p>
                                        </div>

                                        <div class="col-4">
                                            <div class="d-flex flex-column gap-1">
                                                <div class="">
                                                    <h6 class=" {{ 'text-success' }}">
                                                        &#8358;{{ number_format($tran->amount, 2) }}</h6>
                                                </div>
                                                <div class="">
                                                    <a href="/admin/airtime-to-cash/{{ $tran->transaction_id }}"
                                                        class="btn btn-primary">View</a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
