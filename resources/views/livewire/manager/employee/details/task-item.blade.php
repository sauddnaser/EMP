<div class="col-xl-6">

    <!--begin::Feeds Widget 2-->
    <div class="card mb-5 mb-xl-8">

        <!--begin::Body-->
        <div class="card-body pb-0">
            <!--begin::Header-->
            <div class="d-flex align-items-center mb-5">
                <!--begin::User-->
                <div class="d-flex align-items-center flex-grow-1">
                    <!--begin::Avatar-->
                    <div class="symbol symbol-45px me-5">
                        <img src="{{$this->form->task->manager_image_path}}" alt=""/>
                    </div>
                    <!--end::Avatar-->
                    <!--begin::Info-->
                    <div class="d-flex flex-column">
                        <a href="#"
                           class="text-gray-900 text-hover-primary fs-6 fw-bold">{{$this->form->task->manager_name}}</a>
                        <span
                            class="text-gray-400 fw-bold">{{$this->form->task->status}}, {{$this->form->task->due_date}}</span>
                    </div>
                    <!--end::Info-->
                </div>
                <!--end::User-->
                <!--begin::Menu-->
                <div class="my-0">
                    <button wire:click="EditTask" type="button" class="btn btn-sm btn-icon btn-light-primary">
                        <i wire:loading.remove class="ki-outline ki-pencil fs-6"></i>
                        <span wire:loading wire:target="EditTask">
                            <span class="spinner-border spinner-border-sm align-middle"></span>
                        </span>
                    </button>
                </div>
                <!--end::Menu-->
            </div>
            <!--end::Header-->
            <!--begin::Post-->
            <div class="mb-5">
                <!--begin::Text-->
                <p class="text-gray-800 fw-normal mb-5">
                    {{$this->form->task->description}}
                </p>
                <!--end::Text-->

            </div>
            <!--end::Post-->
            <!--begin::Replies-->
            <div class="mb-7">
                @foreach($this->form->task->replies as $reply)
                    <!--begin::Reply-->
                    <div class="d-flex mb-5">
                        <!--begin::Avatar-->
                        <div class="symbol symbol-45px me-5">
                            <img src="{{$reply->author_image}}" alt=""/>
                        </div>
                        <!--end::Avatar-->
                        <!--begin::Info-->
                        <div class="d-flex flex-column flex-row-fluid">
                            <!--begin::Info-->
                            <div class="d-flex align-items-center flex-wrap mb-1">
                                    <span
                                        class="text-gray-800 text-hover-primary fw-bold me-2">{{$reply->author_name}}</span>
                                <span class="text-gray-400 fw-semibold fs-7">{{$reply->updated_at_human}}</span>
                                <span
                                    class="ms-auto fs-40 badge badge-{{$reply->author_class}} fw-semibold fs-9">{{$reply->author_string}}</span>
                            </div>
                            <!--end::Info-->
                            <!--begin::Post-->
                            <span class="text-gray-800 fs-7 fw-normal pt-1">{{$reply->description}}</span>
                            <!--end::Post-->
                        </div>
                        <!--end::Info-->
                    </div>
                    <!--end::Reply-->
                @endforeach


            </div>
            <!--end::Replies-->
            <!--begin::Separator-->
            <div class="separator mb-4"></div>
            <!--end::Separator-->
            <!--begin::Reply input-->
            <form class="position-relative mb-6" wire:submit="reply">
                @csrf
                <textarea wire:model="form.description"
                          class="form-control border-0 p-0 pe-10 resize-none min-h-25px" required
                          rows="1" placeholder="Reply.."></textarea>
                <div class="position-absolute top-0 end-0 me-n5">
                    <button type="submit" class="btn btn-icon btn-sm btn-active-color-primary pe-0 me-2">
                        <i class="ki-outline ki-send fs-2 mb-3"></i>
                    </button>
                </div>
            </form>
            <!--edit::Reply input-->
        </div>
        <!--end::Body-->
    </div>
    <!--end::Feeds Widget 2-->

</div>
