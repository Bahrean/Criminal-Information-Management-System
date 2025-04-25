@extends('investigation_leader.investigation_leader_dashboard')
@section('investigation_leader')

<div class="page-content" style="padding: 25px 15px;">

    <!-- Photo Zoom Modal -->
    <div class="modal fade" id="photoModal" tabindex="-1" aria-labelledby="photoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h5 class="modal-title text-white" id="photoModalLabel">Photo Preview</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <img id="modalImage" src="" alt="Enlarged photo" class="img-fluid">
                </div>
                <div class="modal-footer bg-dark">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Members Table Section -->
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card shadow">
                <div class="card-body">
                    <h6 class="card-title text-center" style="color: yellow; font-size: 20px;">
                        <i class="fas fa-users"></i> All Suspect Reports Sent From Investigator
                    </h6>

                    <div class="table-responsive">
                        <table id="dataTableExample" class="table table-bordered table-striped">
                            <thead>
                                <tr style="background-color: #003f00;">
                                    <th style="font-size: 17px; color: white; font-weight: bold;">ID</th>
                                    <th style="font-size: 17px; color: white; font-weight: bold;">Full Name</th>
                                    <th style="font-size: 17px; color: white; font-weight: bold;">Age</th>
                                    <th style="font-size: 17px; color: white; font-weight: bold;">Gender</th>
                                    <th style="font-size: 17px; color: white; font-weight: bold;">Suspect Photo</th>
                                    <th style="font-size: 17px; color: white; font-weight: bold;">Interview</th>
                                    <th style="font-size: 17px; color: white; font-weight: bold;">DNA Evidence</th>
                                    <th style="font-size: 17px; color: white; font-weight: bold;">Forensic Evidence</th>
                                    <th style="font-size: 17px; color: white; font-weight: bold;">Clinical Report</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($types as $key => $items)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $items->full_name }}</td>
                                        <td>{{ $items->age }}</td>
                                        <td>{{ $items->gender }}</td>
                                        <td>
                                            <img class="wd-100 rounded-circle clickable-photo" 
                                                src="{{ !empty($items->personal_photo) ? url('upload/suspect_info/' . $items->personal_photo) : url('upload/no_image.jpg') }}" 
                                                alt="Suspect Photo" 
                                                style="width: 50px; height: 50px; cursor: pointer;"
                                                data-fullsrc="{{ !empty($items->personal_photo) ? url('upload/suspect_info/' . $items->personal_photo) : url('upload/no_image.jpg') }}">
                                        </td>
                                        <td>{{ $items->interview }}</td>
                                        <td>
                                            <img class="wd-100 rounded-circle clickable-photo" 
                                                src="{{ !empty($items->dna_evidence) ? url('upload/suspect_info/' . $items->dna_evidence) : url('upload/no_image.jpg') }}" 
                                                alt="DNA Evidence" 
                                                style="width: 50px; height: 50px; cursor: pointer;"
                                                data-fullsrc="{{ !empty($items->dna_evidence) ? url('upload/suspect_info/' . $items->dna_evidence) : url('upload/no_image.jpg') }}">
                                        </td>
                                        <td>
                                            <img class="wd-100 rounded-circle clickable-photo" 
                                                src="{{ !empty($items->forensic_evidence) ? url('upload/suspect_info/' . $items->forensic_evidence) : url('upload/no_image.jpg') }}" 
                                                alt="Forensic Evidence" 
                                                style="width: 50px; height: 50px; cursor: pointer;"
                                                data-fullsrc="{{ !empty($items->forensic_evidence) ? url('upload/suspect_info/' . $items->forensic_evidence) : url('upload/no_image.jpg') }}">
                                        </td>
                                        <td>
                                            <img class="wd-100 rounded-circle clickable-photo" 
                                                src="{{ !empty($items->clinical_report) ? url('upload/suspect_info/' . $items->clinical_report) : url('upload/no_image.jpg') }}" 
                                                alt="Clinical Report" 
                                                style="width: 50px; height: 50px; cursor: pointer;"
                                                data-fullsrc="{{ !empty($items->clinical_report) ? url('upload/suspect_info/' . $items->clinical_report) : url('upload/no_image.jpg') }}">
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Initialize the photo modal functionality
    document.addEventListener('DOMContentLoaded', function() {
        const photoModal = new bootstrap.Modal(document.getElementById('photoModal'));
        const modalImage = document.getElementById('modalImage');
        
        // Add click event to all clickable photos
        document.querySelectorAll('.clickable-photo').forEach(photo => {
            photo.addEventListener('click', function() {
                const fullSrc = this.getAttribute('data-fullsrc');
                const altText = this.getAttribute('alt');
                
                modalImage.src = fullSrc;
                modalImage.alt = altText;
                document.getElementById('photoModalLabel').textContent = altText;
                photoModal.show();
            });
        });
    });
</script>

@endsection