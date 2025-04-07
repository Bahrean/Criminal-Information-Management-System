<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criminal Activity Reporting Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
            background-color: #f5f5f5;
            color: #333;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 30px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="email"],
        input[type="tel"],
        input[type="date"],
        input[type="time"],
        textarea,
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        textarea {
            height: 120px;
            resize: vertical;
        }
        .required:after {
            content: " *";
            color: red;
        }
        .btn-submit {
            background-color: #2c3e50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
        }
        .btn-submit:hover {
            background-color: #1a252f;
        }
        .disclaimer {
            font-size: 14px;
            color: #666;
            margin-top: 30px;
            padding: 15px;
            background-color: #f9f9f9;
            border-left: 4px solid #2c3e50;
        }
        .emergency-note {
            color: red;
            font-weight: bold;
            margin: 20px 0;
            text-align: center;
        }
        .language-toggle {
            text-align: right;
            margin-bottom: 20px;
        }
        .language-btn {
            background: none;
            border: 1px solid #2c3e50;
            padding: 5px 10px;
            border-radius: 4px;
            cursor: pointer;
            margin-left: 5px;
        }
        .language-btn.active {
            background-color: #2c3e50;
            color: white;
        }
        .amharic {
            font-family: 'Nyala', 'Abyssinica SIL', 'GF Zemen Unicode', Arial, sans-serif;
            direction: rtl;
        }
    </style>
</head>
<body style="background-color:rgba(51, 3, 14, 0.85)">
    <div class="container" >
        <div class="language-toggle">
            <button id="lang-en" class="language-btn active">English</button>
            <button id="lang-am" class="language-btn">አማርኛ</button>
        </div>
        
        <h1 class="lang-en">Criminal Activity Reporting Form</h1>
        <h1 class="lang-am" style="display:none;">የወንጀል ሪፖርት ፎርም</h1>
        
        
        <form method="POST" action="{{route('criminal_reporting.store')}}" enctype='multipart/form-data' novalidate>
            
            <div class="form-group">
                <label for="incident_date" class="required lang-en">Date of Incident</label>
                <label for="incident_date" class="required lang-am" style="display:none;">የዝግጅት ቀን</label>
                <input type="date" id="incident_date" name="incident_date" required>
            </div>
            
            <div class="form-group">
                <label for="incident_time" class="lang-en">Approximate Time</label>
                <label for="incident_time" class="lang-am" style="display:none;">የዝግጅት ግምታዊ ሰዓት</label>
                <input type="time" id="incident_time" name="incident_time">
            </div>
            
            <div class="form-group">
                <label for="location" class="required lang-en">Location of Incident</label>
                <label for="location" class="required lang-am" style="display:none;">የዝግጅት ቦታ</label>
                <input type="text" id="location" name="location" placeholder="Street address, landmark, or intersection" class="lang-en" required>
                <input type="text" id="location" name="location" placeholder="የጎዳና አድራሻ፣ ምልክታዊ ቦታ ወይም መስቀለኛ መንገድ" class="lang-am" style="display:none;" required>
            </div>
            
            <div class="form-group">
                <label for="description" class="required lang-en">Description of Incident(text)</label>
                <label for="description" class="required lang-am" style="display:none;">የዝግጅት መግለጫ</label>
                <textarea id="description" name="description" placeholder="Please provide as much detail as possible about what happened" class="lang-en" required></textarea>
                <textarea id="description" name="description" placeholder="ስለተከሰተው ክስተት ዝርዝር መረጃ ይስጡ" class="lang-am" style="display:none;" required></textarea>
            </div>

            <div class="form-group">
                <label for="description" class="required lang-en">Description of Incident(Photo, Video ,File)</label>
                <label for="description" class="required lang-am" style="display:none;">የዝግጅት መግለጫ(Photo, Video ,File)</label>
                <input type="file" name="file_path" id="file">
            </div>
            
            <div class="form-group">
                <label for="suspect_Information" class="lang-en">Suspect Information (if known)</label>
                <label for="suspect_Information" class="lang-am" style="display:none;">ስለ ጥርጣሬ ያለው ሰው መረጃ (ካወቁ)</label>
                <textarea id="suspect_Information" name="suspect_Information" placeholder="Physical description, clothing, vehicle Information, etc." class="lang-en"></textarea>
                <textarea id="suspect_Information" name="suspect_Information" placeholder="የሰውነት መግለጫ፣ አለባበስ፣ የተሽከርካሪ መረጃ ወዘተ" class="lang-am" style="display:none;"></textarea>
            </div>
            
            <div class="form-group">
                <label for="witness_Information" class="lang-en">Witness Information</label>
                <label for="witness_Information" class="lang-am" style="display:none;">የምስክር መረጃ</label>
                <textarea id="witness_Information" name="witness_Information" placeholder="Names and contact Information of any witnesses" class="lang-en"></textarea>
                <textarea id="witness_Information" name="witness_Information" placeholder="የምስክሮች ስም እና የማነጋገሪያ መረጃ" class="lang-am" style="display:none;"></textarea>
            </div>
            
            <h3 class="lang-en">Your Information(Optional)</h3>
            <h3 class="lang-am" style="display:none;">የእርስዎ መረጃ()</h3>
            
            <div class="form-group">
                <label for="reporter_name" class="required lang-en">Your Full Name</label>
                <label for="reporter_name" class="required lang-am" style="display:none;">ሙሉ ስምዎ</label>
                <input type="text" id="reporter_name" name="reporter_name" required>
            </div>
            
            <div class="form-group">
                <label for="reporter_email" class="lang-en">Email Address</label>
                <label for="reporter_email" class="lang-am" style="display:none;">ኢሜይል አድራሻ</label>
                <input type="email" id="reporter_email" name="reporter_email">
            </div>
            
            <div class="form-group">
                <label for="reporter_phone" class="required lang-en">Phone Number</label>
                <label for="reporter_phone" class="required lang-am" style="display:none;">ስልክ ቁጥር</label>
                <input type="tel" id="reporter_phone" name="reporter_phone" required>
            </div>
            


            
            <div class="form-group">
                <button type="submit" class="btn-submit lang-en">Submit Report</button>
                <button type="submit" class="btn-submit lang-am" style="display:none;">ሪፖርት አስገባ</button>
            </div>
        </form>

        <form class="forms-sample" method="POST" action="{{route('admin.store')}}" enctype='multipart/form-data' novalidate>
        @csrf
        <div class="row g-4">
            <!-- Error Summary -->
            @if($errors->any())
            <div class="col-12">
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  
            </div>
            @endif

            <!-- Left Column -->
            <div class="col-md-6">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control @error('incident_date') is-invalid @enderror" 
                           id="incident_date" name="incident_date" placeholder=" " value="{{ old('incident_date') }}" autofocus>
                    <label for="incident_date"><i class="fas fa-user me-2"></i>Incident_Date</label>
                    @error('incident_date')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="form-floating mb-3">
                    <input type="incident_time" class="form-control @error('incident_time') is-invalid @enderror" 
                        id="incident_time" name="incident_time" placeholder=" " value="{{ old('incident_time') }}">
                    <label for="incident_time"><i class="fas fa-envelope me-2"></i>incident_time </label>
                    @error('incident_time')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="form-floating mb-3 position-relative">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" 
                           id="password" name="password" placeholder=" " style="padding-right: 65px;">
                    <label for="password"><i class="fas fa-lock me-2"></i>Password</label>
                    <button type="button" class="btn btn-link position-absolute end-0 top-50 translate-middle-y" 
                            style="right: 10px;" onclick="togglePassword()">
                        <i class="fas fa-eye"></i>
                    </button>
                    @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control @error('username') is-invalid @enderror" 
                           id="username" name="username" placeholder=" " value="{{ old('username') }}">
                    <label for="username"><i class="fas fa-at me-2"></i>Username</label>
                    @error('username')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="mb-3">
                    <label class="form-label"><i class="fas fa-venus-mars me-2"></i>Gender</label>
                    <select class="form-select @error('gender') is-invalid @enderror" name="gender">
                        <option value="" selected disabled>Select Gender</option>
                        <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                        <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                    </select>
                    @error('gender')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="mb-3">
                    <label class="form-label"><i class="fas fa-camera me-2"></i>Profile Photo</label>
                    <div class="custom-file">
                        <input type="file" class="form-control @error('photo') is-invalid @enderror" 
                               id="photo" name="photo" accept="image/*">
                        <label class="custom-file-label" for="photo">Choose file</label>
                        @error('photo')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <small class="form-text text-muted">Max size: 2MB (JPEG, PNG)</small>
                </div>
            </div>

            <!-- Right Column -->
            <div class="col-md-6">
                <div class="form-floating mb-3">
                    <input type="tel" class="form-control @error('phone') is-invalid @enderror" 
                           id="phone" name="phone" placeholder=" " value="{{ old('phone') }}">
                    <label for="phone"><i class="fas fa-phone me-2"></i>Phone Number</label>
                    @error('phone')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="mb-3">
                    <label class="form-label"><i class="fas fa-Information me-2"></i>College</label>
                    <select class="form-select @error('college') is-invalid @enderror" 
                            id="collegeSelect" name="collage" required>
                        <option value="" selected disabled>Select College</option>
                        <option value="Informationrmatics" {{ old('college') == 'Informationrmatics' ? 'selected' : '' }}>
                            Informationrmatics
                        </option>
                        <option value="engineering" {{ old('college') == 'engineering' ? 'selected' : '' }}>
                            Engineering
                        </option>
                    </select>
                    @error('college')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="mb-3">
                    <label class="form-label"><i class="fas fa-building me-2"></i>Department</label>
                    <select class="form-select @error('department') is-invalid @enderror" 
                            id="departmentSelect" name="department" required disabled>
                        <option value="" selected disabled>Select Department</option>
                    </select>
                    @error('department')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control @error('address') is-invalid @enderror" 
                           id="address" name="address" placeholder=" " value="{{ old('address') }}">
                    <label for="address"><i class="fas fa-map-marker-alt me-2"></i>Address</label>
                    @error('address')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="mb-3">
                    <label class="form-label"><i class="fas fa-user-tag me-2"></i>Role</label>
                    <select class="form-select @error('role') is-invalid @enderror" name="role">
                        <option value="" selected disabled>Select Role</option>
                        <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="collage_dean" {{ old('role') == 'collage_dean' ? 'selected' : '' }}>
                            College Dean
                        </option>
                        <option value="collage_registral" {{ old('role') == 'collage_registral' ? 'selected' : '' }}>
                            College Registrar
                        </option>
                        <option value="investigator" {{ old('role') == 'investigator' ? 'selected' : '' }}>
                            Department Head
                        </option>
                        <option value="stuff" {{ old('role') == 'staff' ? 'selected' : '' }}>Stuff</option>
                    </select>
                    @error('role')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="mb-3">
                    <label class="form-label"><i class="fas fa-toggle-on me-2"></i>Status</label>
                    <select class="form-select @error('status') is-invalid @enderror" name="status">
                        <option value="" selected disabled>Select Status</option>
                        <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                    @error('status')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>
        </div>

        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
            <button type="submit" class="btn btn-success btn-lg px-4">
                <i class="fas fa-user-plus me-2"></i>Add Member
            </button>
        </div>
    </form>
        

    </div>
    
    <script>
        // Language toggle functionality
        document.getElementById('lang-en').addEventListener('click', function() {
            document.querySelectorAll('.lang-en').forEach(el => el.style.display = '');
            document.querySelectorAll('.lang-am').forEach(el => el.style.display = 'none');
            document.getElementById('lang-en').classList.add('active');
            document.getElementById('lang-am').classList.remove('active');
            document.documentElement.lang = 'en';
        });
        
        document.getElementById('lang-am').addEventListener('click', function() {
            document.querySelectorAll('.lang-en').forEach(el => el.style.display = 'none');
            document.querySelectorAll('.lang-am').forEach(el => el.style.display = '');
            document.getElementById('lang-en').classList.remove('active');
            document.getElementById('lang-am').classList.add('active');
            document.documentElement.lang = 'am';
        });
        
        // Form validation
        document.getElementById('crimeReportForm').addEventListener('submit', function(e) {
            const anonymousChecked = document.getElementById('anonymous').checked;
            const nameField = document.getElementById('reporterName');
            const phoneField = document.getElementById('reporterPhone');
            
            if (!anonymousChecked && (!nameField.value || !phoneField.value)) {
                const errorMsg = document.documentElement.lang === 'en' ? 
                    'Please provide your name and phone number unless reporting anonymously' :
                    'እባክዎ ስምዎን እና ስልክ ቁጥርዎን ያስገቡ ወይም ስም ሳይጠቀሱ ሪፖርት ያድርጉ';
                alert(errorMsg);
                e.preventDefault();
                return false;
            }
            return true;
        });
        
        // Toggle required fields based on anonymous checkbox
        document.getElementById('anonymous').addEventListener('change', function() {
            const requiredFields = document.querySelectorAll('#reporterName, #reporterPhone');
            requiredFields.forEach(field => {
                field.required = !this.checked;
            });
        });
    </script>
</body>
</html>
