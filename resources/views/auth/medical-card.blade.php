@include('auth.header')

@include('auth.sidebar')


<div class="content">

    <div class="container-fluid">

        <div class="card shadow mt-4">

            <div class="card-header bg-danger text-white">
                <h4>
                    🏥 Emergency Medical Card
                </h4>

                <p class="mb-0">
                    Your medical details will help during emergency situations.
                </p>

            </div>


            <div class="card-body">


                @if(session('success'))

                <div class="alert alert-success">
                    {{session('success')}}
                </div>

                @endif



                <form action="{{ route('medical.card.save') }}" method="POST">

                    @csrf


                    <div class="row">


                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Blood Group
                            </label>


                            <select name="blood_group" 
                            class="form-control">


                                <option value="">
                                    Select Blood Group
                                </option>


                                @foreach(['A+','A-','B+','B-','O+','O-','AB+','AB-'] as $group)

                                <option value="{{$group}}"
                                
                                {{ 
                                ($medical->blood_group ?? '') == $group 
                                ? 'selected' : ''
                                }}>

                                    {{$group}}

                                </option>

                                @endforeach


                            </select>

                        </div>



                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Emergency Contact
                            </label>


                            <input type="text"
                            name="emergency_contact"
                            class="form-control"
                            value="{{$medical->emergency_contact ?? ''}}"
                            placeholder="Emergency phone number">

                        </div>


                    </div>



                    <div class="mb-3">

                        <label>
                            Allergies
                        </label>


                        <textarea 
                        name="allergies"
                        class="form-control"
                        rows="3"
                        placeholder="Example: Dust allergy, Food allergy">

                        {{$medical->allergies ?? ''}}

                        </textarea>


                    </div>



                    <div class="mb-3">

                        <label>
                            Medical Conditions
                        </label>


                        <textarea 
                        name="medical_conditions"
                        class="form-control"
                        rows="3"
                        placeholder="Example: Asthma, Diabetes">

                        {{$medical->medical_conditions ?? ''}}

                        </textarea>


                    </div>



                    <button class="btn btn-danger">

                        💾 Save Medical Card

                    </button>


                </form>


            </div>

        </div>


    </div>

</div>


@include('auth.footer')