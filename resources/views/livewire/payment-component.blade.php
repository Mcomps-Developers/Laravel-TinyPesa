<div class="container p-0">
    <div class="card px-4">
        <form action=""
              wire:submit.prevent="startPayment">
            <p class="h8 py-3">Payment Details</p>
            <div class="row gx-3">
                <div class="col-12">
                    <div class="d-flex flex-column">
                        <p class="text mb-1">Your Name</p>
                        <input class="form-control mb-3 @error('name') is-invalid @enderror"
                               type="text"
                               autofocus
                               wire:model="name"
                               autocomplete="none"
                               placeholder="Name">
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="d-flex flex-column">
                        <p class="text mb-1">Mpesa Number</p>
                        <input class="form-control mb-3 @error('phone_number') is-invalid @enderror"
                               type="text"
                               wire:model="phone_number"
                               placeholder="2547xxxxxxxx">
                        @error('phone_number')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="d-flex flex-column">
                        <p class="text mb-1">Amount</p>
                        <input class="form-control mb-3 pt-2 @error('amount') is-invalid @enderror"
                               type="number"
                               value="10"
                               wire:model="amount"
                               placeholder="10">
                        @error('amount')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <!-- Success alert -->
                <!-- Success alert -->
                @if ($status && isset($this->msg_resp->success) && $this->msg_resp->success == true)
                <div class="alert alert-success mt-4">
                    {!! $status !!}
                </div>
                @endif

                <!-- Error alert -->
                @if ($status && (!isset($this->msg_resp->success) || $this->msg_resp->success == false))
                <div class="alert alert-danger mt-4">
                    {!! $status !!}
                </div>
                @endif
                <div class="col-12">
                    <button class="btn btn-primary mb-3">
                        <span class="ps-3">Pay Ksh {{ $amount }}</span>
                        <span class="fas fa-arrow-right"></span>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
