@include('auth.header')
@include('auth.sidebar')

<div class="content">

    <div class="container">

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <div class="card shadow border-0">

            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">

                <h3 class="mb-0">
                    👤 My Profile
                </h3>

                <button type="button"
                        id="editBtn"
                        class="btn btn-light">
                    <i class="fa fa-pen"></i> Edit Profile
                </button>

            </div>

            <div class="card-body">

                <form action="{{ route('profile.update') }}"
                      method="POST"
                      enctype="multipart/form-data">

                    @csrf

                    <div class="text-center mb-4">

                        @if($student->photo)

                            <img src="{{ asset('uploads/'.$student->photo) }}"
                                 width="170"
                                 height="170"
                                 class="rounded-circle border border-3 shadow">

                        @else

                            <img src="https://via.placeholder.com/170"
                                 width="170"
                                 height="170"
                                 class="rounded-circle border border-3 shadow">

                        @endif

                    </div>

                    <div class="mb-3">

                        <label>Name</label>

                        <input type="text"
                               name="name"
                               value="{{ $student->name }}"
                               class="form-control profile-input"
                               readonly>

                    </div>

                    <div class="mb-3">

                        <label>Register Number</label>

                        <input
type="text"
name="register_no"
value="{{ $student->register_no }}"
class="form-control profile-input"
readonly>

                    </div>

                    <div class="mb-3">

                        <label>Department</label>

                        <input type="text"
                               value="{{ $student->department }}"
                               class="form-control profile-input"
                               readonly>

                    </div>

                    <div class="mb-3">

                        <label>Year</label>

                        <input type="text"
                               value="{{ $student->year }}"
                               class="form-control profile-input"
                               readonly>

                    </div>

                    <div class="mb-3">

                        <label>Email</label>

                        <input type="email"
                               value="{{ $student->email }}"
                               class="form-control profile-input"
                               readonly>

                    </div>

                    <div class="mb-3">

                        <label>Phone</label>

                        <input type="text"
                               name="phone"
                               value="{{ $student->phone }}"
                               class="form-control profile-input"
                               readonly>

                    </div>

                    <div class="mb-3">

                        <label>Address</label>

                        <textarea name="address"
                                  rows="4"
                                  class="form-control profile-input"
                                  readonly>{{ $student->address }}</textarea>

                    </div>

                    <div class="mb-3"
                         id="photoDiv"
                         style="display:none;">

                        <label>Change Photo</label>

                        <input type="file"
                               name="photo"
                               class="form-control profile input">

                    </div>

                    <button type="submit"
                            id="saveBtn"
                            class="btn btn-success"
                            style="display:none;">

                        <i class="fa fa-save"></i>
                        Save Changes

                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

@include('auth.footer')

<script>
document.addEventListener("DOMContentLoaded", function () {

    const editBtn = document.getElementById("editBtn");
    const saveBtn = document.getElementById("saveBtn");
    const photoDiv = document.getElementById("photoDiv");

    editBtn.addEventListener("click", function () {

        document.querySelectorAll(".profile-input").forEach(function(input){

            input.removeAttribute("readonly");

        });

        photoDiv.style.display = "block";
        saveBtn.style.display = "inline-block";
        editBtn.style.display = "none";

    });

});
</script>