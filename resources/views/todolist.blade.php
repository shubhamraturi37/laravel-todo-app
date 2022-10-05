@extends('layouts.app')

@section('content')
    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">
                    <div class="card" id="list1" style="border-radius: .75rem; background-color: #eff1f2;">
                        <div class="card-body py-4 px-4 px-md-5">

                            <p class="h1 text-center mt-3 mb-4 pb-3 text-primary">
                                <i class="fas fa-check-square me-1"></i>
                                <u>My Todo-s</u>
                            </p>

                            <div class="pb-2">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex flex-row align-items-center">
                                            <input type="text" class="form-control form-control-lg" id="exampleFormControlInput1"
                                                   placeholder="Add new...">
                                            <a href="#!" data-mdb-toggle="tooltip" title="Set due date"><i
                                                    class="fas fa-calendar-alt fa-lg me-3"></i></a>
                                            <div>
                                                <button type="button" class="btn btn-primary">Add</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr class="my-4">

                            <div class="d-flex justify-content-end align-items-center mb-4 pt-2 pb-3">
                                <p class="small mb-0 me-2 text-muted">Filter</p>
                                <select class="select">
                                    <option value="1">All</option>
                                    <option value="2">Completed</option>
                                    <option value="3">Active</option>
                                    <option value="4">Has due date</option>
                                </select>
                                <p class="small mb-0 ms-4 me-2 text-muted">Sort</p>
                                <select class="select">
                                    <option value="1">Added date</option>
                                    <option value="2">Due date</option>
                                </select>
                                <a href="#!" style="color: #23af89;" data-mdb-toggle="tooltip" title="Ascending"><i
                                        class="fas fa-sort-amount-down-alt ms-2"></i></a>
                            </div>




                            <show-list></show-list>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
