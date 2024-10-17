@extends('layouts.layout')
@section('title', 'Form')

@section('content')
<div class="jarak"></div>
<div class="container mt-5">
    <div class="row my-5 justify-content-center">
        <div class="col-lg-8">
            <div class="card mt-5 bg-shadow border-0 shadow rounded-2">
                <div class="card-body">
                    <form action="/form/submit" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-step form-step-active">
                            <h3>Biodata</h3>
                            <div class="mb-3">
                                <label for="full_name" class="form-label">Nama Lengkap:</label>
                                <input type="text" class="form-control" id="kode" name="kode" value="{{ request()->route('kode') }}"
                                    required hidden>
                                <input type="text" class="form-control" id="full_name" name="full_name" required>
                                <span class="error-message" style="color: red; display: none;">Inputan ini wajib diisi !</span> <!-- Pesan error -->
                            </div>
                            <div class="mb-3">
                                <label for="birth_date" class="form-label">Tanggal Lahir:</label>
                                <input type="date" class="form-control" id="birth_date" name="birth_date" required>
                                <span class="error-message" style="color: red; display: none;">Inputan ini wajib diisi !</span> <!-- Pesan error -->
                            </div>
                            <button type="button" class="btn btn-primary mx-auto d-block next-step">Next</button>
                        </div>
                        <div class="form-step">
                            <h3>Kontak</h3>
                            <div class="mb-3">
                                <label for="whatsapp_number" class="form-label">Nomor Whatsapp:</label>
                                <input type="text" class="form-control" id="whatsapp_number" name="whatsapp_number"
                                    placeholder="ex: 0895410871030" required>
                                <span class="error-message" style="color: red; display: none;">Inputan ini wajib diisi !</span> <!-- Pesan error -->

                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Alamat Email:</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="ex: example@gmail.com"
                                    required>
                                <span class="error-message" style="color: red; display: none;">Inputan ini wajib diisi !</span> <!-- Pesan error -->

                            </div>
                            <div class="mb-3">
                                <label for="linkedin" class="form-label">Alamat LinkedIn:</label>
                                <input type="url" class="form-control" id="linkedin" name="linkedin"
                                    placeholder="opsional (ex : https://linkedin.com/example)">
                            </div>
                            <div class="mb-3">
                                <label for="domicile" class="form-label">Alamat Domisili:</label>
                                <input type="text" class="form-control" id="domicile" name="domicile" placeholder="ex: Bogor, Jawa Barat"
                                    required>
                                <span class="error-message" style="color: red; display: none;">Inputan ini wajib diisi !</span> <!-- Pesan error -->
                            </div>
                            <div class="mb-3">
                                <label for="social_media" class="form-label">Sosial Media (Yang aktif dan memiliki riwayat akun yang baik):</label>
                                <input type="text" class="form-control" id="social_media" name="social_media" placeholder="instagram/tiktok">
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-lg-3">
                                    <button type="button" class="btn btn-primary prev-step">Previous</button>
                                    <button type="button" class="btn btn-primary next-step">Next</button>
                                </div>
                            </div>
                        </div>
                        <div class="form-step">
                            <div id="experience-container-work">
                                <div class="experience-group-work mb-3">
                                    <h4>Pengalaman Kerja</h4>
                                    <div class="mb-3">
                                        <label for="company_name_1" class="form-label">Nama perusahaan:</label>
                                        <input type="text" class="form-control" id="work_company_name_1"
                                            name="work_experience[0][company_name]">
                                    </div>
                                    <div class="mb-3">
                                        <label for="company_location_1" class="form-label">Lokasi perusahaan:</label>
                                        <input type="text" class="form-control" id="work_company_location_1"
                                            name="work_experience[0][company_location]">
                                    </div>
                                    <div class="mb-3">
                                        <label for="position_1" class="form-label">Jabatan:</label>
                                        <input type="text" class="form-control" id="work_position_1" name="work_experience[0][position]">
                                    </div>
                                    <div class="mb-3">
                                        <label for="year_range_1" class="form-label">Tahun masuk-keluar:</label>
                                        <input type="text" class="form-control" id="work_year_range_1" placeholder="ex: 2022 - sekarang"
                                            name="work_experience[0][year_range]">
                                    </div>
                                    <div class="mb-3">
                                        <label for="tasks_1" class="form-label">Tugas yang dilakukan:</label>
                                        <textarea class="form-control" id="work_tasks_1" name="work_experience[0][tasks]"
                                            rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-lg-6">
                                    <button type="button" class="btn btn-primary prev-step">Previous</button>
                                    <button type="button" class="btn btn-primary" id="add-experience-work">Tambah Pengalaman Kerja</button>
                                    <button type="button" class="btn btn-primary next-step">Next</button>
                                </div>
                            </div>
                        </div>
                        <div class="form-step">
                            <div id="experience-container-magang">
                                <div class="experience-group-magang mb-3">
                                    <h4>Pengalaman Magang</h4>
                                    <div class="mb-3">
                                        <label for="company_name_1" class="form-label">Nama perusahaan:</label>
                                        <input type="text" class="form-control" id="magang_company_name_1"
                                            name="magang_experience[0][company_name]">
                                    </div>
                                    <div class="mb-3">
                                        <label for="company_location_1" class="form-label">Lokasi perusahaan:</label>
                                        <input type="text" class="form-control" id="magang_company_location_1"
                                            name="magang_experience[0][company_location]">
                                    </div>
                                    <div class="mb-3">
                                        <label for="position_1" class="form-label">Jabatan:</label>
                                        <input type="text" class="form-control" id="magang_position_1"
                                            name="magang_experience[0][position]">
                                    </div>
                                    <div class="mb-3">
                                        <label for="year_range_1" class="form-label">Tahun masuk-keluar:</label>
                                        <input type="text" class="form-control" id="magang_year_range_1" placeholder="ex: 2022 - sekarang"
                                            name="magang_experience[0][year_range]">
                                    </div>
                                    <div class="mb-3">
                                        <label for="tasks_1" class="form-label">Tugas yang dilakukan:</label>
                                        <textarea class="form-control" id="magang_tasks_1" name="magang_experience[0][tasks]"
                                            rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-lg-6">
                                    <button type="button" class="btn btn-primary prev-step">Previous</button>
                                    <button type="button" class="btn btn-primary" id="add-experience-magang">Tambah Pengalaman Magang</button>
                                    <button type="button" class="btn btn-primary next-step">Next</button>
                                </div>
                            </div>
                        </div>
                        <div class="form-step">
                            <div id="experience-container-volunteer">
                                <div class="experience-group-volunteer mb-3">
                                    <h4>Pengalaman Volunteer</h4>
                                    <div class="mb-3">
                                        <label for="company_name_1" class="form-label">Nama perusahaan:</label>
                                        <input type="text" class="form-control" id="volunteer_company_name_1"
                                            name="volunteer_experience[0][company_name]">
                                    </div>
                                    <div class="mb-3">
                                        <label for="company_location_1" class="form-label">Lokasi perusahaan:</label>
                                        <input type="text" class="form-control" id="volunteer_company_location_1"
                                            name="volunteer_experience[0][company_location]">
                                    </div>
                                    <div class="mb-3">
                                        <label for="position_1" class="form-label">Jabatan:</label>
                                        <input type="text" class="form-control" id="volunteer_position_1"
                                            name="volunteer_experience[0][position]">
                                    </div>
                                    <div class="mb-3">
                                        <label for="year_range_1" class="form-label">Tahun masuk-keluar:</label>
                                        <input type="text" class="form-control" id="volunteer_year_range_1"
                                            placeholder="ex: 2022 - sekarang" name="volunteer_experience[0][year_range]">
                                    </div>
                                    <div class="mb-3">
                                        <label for="tasks_1" class="form-label">Tugas yang dilakukan:</label>
                                        <textarea class="form-control" id="volunteer_tasks_1" name="volunteer_experience[0][tasks]"
                                            rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-lg-6">
                                    <button type="button" class="btn btn-primary prev-step">Previous</button>
                                    <button type="button" class="btn btn-primary" id="add-experience-volunteer">Tambah Pengalaman Volunteer</button>
                                    <button type="button" class="btn btn-primary next-step">Next</button>
                                </div>
                            </div>
                        </div>
                        <div class="form-step">
                            <h3>Organisasi</h3>
                            <div class="mb-3">
                                <label for="organization_name" class="form-label">Nama organisasi:</label>
                                <input type="text" class="form-control" id="organization_name" name="organization_name">
                            </div>
                            <div class="mb-3">
                                <label for="organization_position" class="form-label">Jabatan:</label>
                                <input type="text" class="form-control" id="organization_position" name="organization_position">
                            </div>
                            <div class="mb-3">
                                <label for="organization_year_range" class="form-label">Tahun masuk-keluar:</label>
                                <input type="text" class="form-control" id="organization_year_range" placeholder="ex: 2022 - sekarang"
                                    name="organization_year_range">
                            </div>
                            <div class="mb-3">
                                <label for="organization_tasks" class="form-label">Tugas Pekerjaan:</label>
                                <textarea class="form-control" id="organization_tasks" name="organization_tasks" rows="3"></textarea>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-lg-3">
                                    <button type="button" class="btn btn-primary prev-step">Previous</button>
                                    <button type="button" class="btn btn-primary next-step">Next</button>
                                </div>
                            </div>
                        </div>
                        <div class="form-step">
                            <h3>Riwayat Pendidikan</h3>

                            <div class="mb-3">
                                <label for="highschool_name" class="form-label">Nama SMA:</label>
                                <input type="text" class="form-control" id="highschool_name" name="highschool_name">
                            </div>
                            <div class="mb-3">
                                <label for="highschool_major" class="form-label">Jurusan:</label>
                                <input type="text" class="form-control" id="highschool_major" name="highschool_major">
                            </div>
                            <div class="mb-3">
                                <label for="highschool_year_range" class="form-label">Tahun masuk-keluar:</label>
                                <input type="text" class="form-control" id="highschool_year_range" placeholder="ex: 2022 - sekarang"
                                    name="highschool_year_range">
                            </div>
                            <div class="mb-3">
                                <label for="highschool_avg_grade" class="form-label">Nilai rata-rata ijazah:</label>
                                <input type="text" class="form-control" id="highschool_avg_grade" name="highschool_avg_grade">
                            </div>

                            <div id="educationContainer">
                                <div class="education-group mb-3">
                                    <div class="mb-3">
                                        <label for="university_name" class="form-label">Nama Universitas:</label>
                                        <input type="text" class="form-control" id="university_name" name="education[0][university_name]">
                                    </div>
                                    <div class="mb-3">
                                        <label for="degree" class="form-label">S2/S1/D3:</label>
                                        <select class="form-control" name="education[0][degree]" id="degree">
                                            <option value="none">none</option>
                                            <option value="D3">D3</option>
                                            <option value="D4">D4</option>
                                            <option value="S1">S1</option>
                                            <option value="S2">S2</option>
                                            <option value="S3">S3</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="major" class="form-label">Jurusan:</label>
                                        <input type="text" class="form-control" id="major" name="education[0][major]">
                                    </div>
                                    <div class="mb-3">
                                        <label for="education_year_range" class="form-label">Tahun masuk-keluar:</label>
                                        <input type="text" class="form-control" id="education_year_range" placeholder="ex: 2022 - sekarang"
                                            name="education[0][education_year_range]">
                                    </div>
                                    <div class="mb-3">
                                        <label for="gpa" class="form-label">IPK:</label>
                                        <input type="text" class="form-control" id="gpa" name="education[0][gpa]">
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-lg-6">
                                    <button type="button" class="btn btn-primary prev-step">Previous</button>
                                    <button type="button" id="addEducationButton" class="btn btn-primary">Tambah Pendidikan</button>
                                    <button type="button" class="btn btn-primary next-step">Next</button>
                                </div>
                            </div>
                        </div>
                        <div class="form-step">
                            <h3>Keahlian</h3>
                            <div class="mb-3">
                                <label for="hardskill" class="form-label">Hardskill:</label>
                                <textarea type="text" class="form-control" id="hardskill" rows="3"
                                    placeholder="ex: project management, digital marketing, dll" name="hardskill"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="softskill" class="form-label">Softskill:</label>
                                <textarea type="text" class="form-control" id="softskill" rows="3"
                                    placeholder="ex: komunikasi, teamwork, dll" name="softskill"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="language" class="form-label">Bahasa:</label>
                                <input type="text" class="form-control" id="language" name="language">
                            </div>
                            <div class="mb-3">
                                <label for="software" class="form-label">Software:</label>
                                <input type="text" class="form-control" id="software"
                                    placeholder="ex: microsoft office, adobe ilustrator, dll" name="software">
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-lg-3">
                                    <button type="button" class="btn btn-primary prev-step">Previous</button>
                                    <button type="button" class="btn btn-primary next-step">Next</button>
                                </div>
                            </div>
                        </div>
                        <div class="form-step">
                            <h3>Sertifikat</h3>
                            <div class="mb-3">
                                <label for="internship_certificate" class="form-label">Sertifikat Magang atau Kerja:</label>
                                <textarea type="text" class="form-control" id="internship_certificate" rows="3"
                                    name="internship_certificate"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="seminar_certificate" class="form-label">Sertifikat Seminar:</label>
                                <textarea type="text" class="form-control" id="seminar_certificate" rows="3"
                                    name="seminar_certificate"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="other_certificate" class="form-label">Sertifikat Lainnya:</label>
                                <textarea type="text" class="form-control" id="other_certificate" rows="3"
                                    name="other_certificate"></textarea>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-lg-3">
                                    <button type="button" class="btn btn-primary prev-step">Previous</button>
                                    <button type="submit" class="btn btn-primary">Kirim Data</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        let experienceIndex1 = 1;
        let experienceIndex2 = 2;
        let experienceIndex3 = 3;

        const addExperienceButton1 = document.getElementById('add-experience-work');
        const experienceContainer1 = document.getElementById('experience-container-work');
        const addExperienceButton2 = document.getElementById('add-experience-magang');
        const experienceContainer2 = document.getElementById('experience-container-magang');
        const addExperienceButton3 = document.getElementById('add-experience-volunteer');
        const experienceContainer3 = document.getElementById('experience-container-volunteer');

        addExperienceButton1.addEventListener('click', function() {
            const newExperienceGroup1 = document.createElement('div');
            newExperienceGroup1.className = 'experience-group-work mb-3';

            // Inner HTML with a delete button
            newExperienceGroup1.innerHTML = `
                <h4>Pengalaman Kerja</h4>
                <div class="mb-3">
                    <label for="company_name_${experienceIndex1}" class="form-label">Nama perusahaan:</label>
                    <input type="text" class="form-control" id="work_company_name_${experienceIndex1}" name="work_experience[${experienceIndex1}][company_name]">
                </div>
                <div class="mb-3">
                    <label for="company_location_${experienceIndex1}" class="form-label">Lokasi perusahaan:</label>
                    <input type="text" class="form-control" id="work_company_location_${experienceIndex1}" name="work_experience[${experienceIndex1}][company_location]">
                </div>
                <div class="mb-3">
                    <label for="position_${experienceIndex1}" class="form-label">Jabatan:</label>
                    <input type="text" class="form-control" id="work_position_${experienceIndex1}" name="work_experience[${experienceIndex1}][position]">
                </div>
                <div class="mb-3">
                    <label for="year_range_${experienceIndex1}" class="form-label">Tahun masuk-keluar:</label>
                    <input type="text" class="form-control" id="work_year_range_${experienceIndex1}" name="work_experience[${experienceIndex1}][year_range]">
                </div>
                <div class="mb-3">
                    <label for="tasks_${experienceIndex1}" class="form-label">Tugas yang dilakukan:</label>
                    <textarea class="form-control" id="work_tasks_${experienceIndex1}" name="work_experience[${experienceIndex1}][tasks]" rows="3"></textarea>
                </div>
                <!-- Delete button -->
                <button type="button" class="btn btn-danger btn-sm remove-experience">Hapus</button>
            `;

            // Append new experience group to container
            experienceContainer1.appendChild(newExperienceGroup1);

            // Add event listener to remove button
            const removeButton = newExperienceGroup1.querySelector('.remove-experience');
            removeButton.addEventListener('click', function() {
                experienceContainer1.removeChild(newExperienceGroup1);
            });

            // Increment the experience index
            experienceIndex1++;
        });

        addExperienceButton2.addEventListener('click', function() {
            const newExperienceGroup2 = document.createElement('div');
            newExperienceGroup2.className = 'experience-group-magang mb-3';

            // Inner HTML with a delete button
            newExperienceGroup2.innerHTML = `
                <h4>Pengalaman Magang</h4>
                <div class="mb-3">
                    <label for="company_name_${experienceIndex2}" class="form-label">Nama perusahaan:</label>
                    <input type="text" class="form-control" id="magang_company_name_${experienceIndex2}" name="magang_experience[${experienceIndex2}][company_name]">
                </div>
                <div class="mb-3">
                    <label for="company_location_${experienceIndex2}" class="form-label">Lokasi perusahaan:</label>
                    <input type="text" class="form-control" id="magang_company_location_${experienceIndex2}" name="magang_experience[${experienceIndex2}][company_location]">
                </div>
                <div class="mb-3">
                    <label for="position_${experienceIndex2}" class="form-label">Jabatan:</label>
                    <input type="text" class="form-control" id="magang_position_${experienceIndex2}" name="magang_experience[${experienceIndex2}][position]">
                </div>
                <div class="mb-3">
                    <label for="year_range_${experienceIndex2}" class="form-label">Tahun masuk-keluar:</label>
                    <input type="text" class="form-control" id="magang_year_range_${experienceIndex2}" name="magang_experience[${experienceIndex2}][year_range]">
                </div>
                <div class="mb-3">
                    <label for="tasks_${experienceIndex2}" class="form-label">Tugas yang dilakukan:</label>
                    <textarea class="form-control" id="magang_tasks_${experienceIndex2}" name="magang_experience[${experienceIndex2}][tasks]" rows="3"></textarea>
                </div>
                <!-- Delete button -->
                <button type="button" class="btn btn-danger btn-sm remove-experience">Hapus</button>
            `;

            // Append new experience group to container
            experienceContainer2.appendChild(newExperienceGroup2);

            // Add event listener to remove button
            const removeButton = newExperienceGroup2.querySelector('.remove-experience');
            removeButton.addEventListener('click', function() {
                experienceContainer2.removeChild(newExperienceGroup2);
            });

            // Increment the experience index
            experienceIndex2++;
        });

        addExperienceButton3.addEventListener('click', function() {
            const newExperienceGroup3 = document.createElement('div');
            newExperienceGroup3.className = 'experience-group-volunteer mb-3';

            // Inner HTML with a delete button
            newExperienceGroup3.innerHTML = `
                <h4>Pengalaman Volunteer</h4>
                <div class="mb-3">
                    <label for="company_name_${experienceIndex3}" class="form-label">Nama perusahaan:</label>
                    <input type="text" class="form-control" id="wolunteer_company_name_${experienceIndex3}" name="wolunteer_experience[${experienceIndex3}][company_name]">
                </div>
                <div class="mb-3">
                    <label for="company_location_${experienceIndex3}" class="form-label">Lokasi perusahaan:</label>
                    <input type="text" class="form-control" id="wolunteer_company_location_${experienceIndex3}" name="wolunteer_experience[${experienceIndex3}][company_location]">
                </div>
                <div class="mb-3">
                    <label for="position_${experienceIndex3}" class="form-label">Jabatan:</label>
                    <input type="text" class="form-control" id="wolunteer_position_${experienceIndex3}" name="wolunteer_experience[${experienceIndex3}][position]">
                </div>
                <div class="mb-3">
                    <label for="year_range_${experienceIndex3}" class="form-label">Tahun masuk-keluar:</label>
                    <input type="text" class="form-control" id="wolunteer_year_range_${experienceIndex3}" name="wolunteer_experience[${experienceIndex3}][year_range]">
                </div>
                <div class="mb-3">
                    <label for="tasks_${experienceIndex3}" class="form-label">Tugas yang dilakukan:</label>
                    <textarea class="form-control" id="wolunteer_tasks_${experienceIndex3}" name="wolunteer_experience[${experienceIndex3}][tasks]" rows="3"></textarea>
                </div>
                <!-- Delete button -->
                <button type="button" class="btn btn-danger btn-sm remove-experience">Hapus</button>
            `;

            // Append new experience group to container
            experienceContainer3.appendChild(newExperienceGroup3);

            // Add event listener to remove button
            const removeButton = newExperienceGroup3.querySelector('.remove-experience');
            removeButton.addEventListener('click', function() {
                experienceContainer3.removeChild(newExperienceGroup3);
            });

            // Increment the experience index
            experienceIndex3++;
        });
    });

    let educationIndex = 1;

    document.getElementById('addEducationButton').addEventListener('click', function() {
        const newEducationGroup = document.createElement('div');
        newEducationGroup.className = 'education-group mb-3';
        newEducationGroup.innerHTML = `
            <div class="mb-3">
                <label for="university_name_${educationIndex}" class="form-label">Nama Universitas:</label>
                <input type="text" class="form-control" id="university_name_${educationIndex}" name="education[${educationIndex}][university_name]">
            </div>
            <div class="mb-3">
                <label for="degree_${educationIndex}" class="form-label">S2/S1/D3:</label>
                <select class="form-control" name="education[${educationIndex}][degree]" id="degree_${educationIndex}">
                    <option value="none">none</option>
                    <option value="D3">D3</option>
                    <option value="D4">D4</option>
                    <option value="S1">S1</option>
                    <option value="S2">S2</option>
                    <option value="S3">S3</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="major_${educationIndex}" class="form-label">Jurusan:</label>
                <input type="text" class="form-control" id="major_${educationIndex}" name="education[${educationIndex}][major]">
            </div>
            <div class="mb-3">
                <label for="education_year_range_${educationIndex}" class="form-label">Tahun masuk-keluar:</label>
                <input type="text" class="form-control" id="education_year_range_${educationIndex}" name="education[${educationIndex}][year_range]" placeholder="ex: 2022 - sekarang">
            </div>
            <div class="mb-3">
                <label for="gpa_${educationIndex}" class="form-label">IPK:</label>
                <input type="text" class="form-control" id="gpa_${educationIndex}" name="education[${educationIndex}][gpa]">
            </div>
            <!-- Button hanya untuk div baru -->
            <button type="button" class="btn btn-danger removeEducationButton">Hapus Pendidikan</button>
        `;

        // Menambahkan event listener untuk tombol hapus hanya pada div yang baru ditambahkan
        newEducationGroup.querySelector('.removeEducationButton').addEventListener('click', function() {
            newEducationGroup.remove();
        });

        // Menambahkan elemen baru ke dalam container
        document.getElementById('educationContainer').appendChild(newEducationGroup);

        // Meningkatkan indeks
        educationIndex++;
    });
</script>
@endsection