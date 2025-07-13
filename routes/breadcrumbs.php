<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// patientRecord (root)
Breadcrumbs::for('patientRecord', function (BreadcrumbTrail $trail) {
    $trail->push('Patient Record', route('patientRecord'));
});

// patientRecord > Student
Breadcrumbs::for('patientRecord.stud', function (BreadcrumbTrail $trail) {
    $trail->parent('patientRecord');
    $trail->push('Student', route('patientRecordstud'));
});

// patientRecord > Faculty
Breadcrumbs::for('patientRecord.faculty', function (BreadcrumbTrail $trail) {
    $trail->parent('patientRecord');
    $trail->push('Faculty', route('patientRecordfac'));
});

// patientRecord > Staff
Breadcrumbs::for('patientRecord.staff', function (BreadcrumbTrail $trail) {
    $trail->parent('patientRecord');
    $trail->push('Staff', route('patientRecordstaff'));
});

// patientRecord > Extension
Breadcrumbs::for('patientRecord.extension', function (BreadcrumbTrail $trail) {
    $trail->parent('patientRecord');
    $trail->push('Extension', route('patientRecordexten'));
});


// patientRecord > Add Patient > Student > Add Student
Breadcrumbs::for('patientRecord.addstudent', function (BreadcrumbTrail $trail) {
    $trail->parent('patientRecord');
    $trail->push('Student', route('addStudent'));
    $trail->push('Add Student', route('addStudent'));
});

// patientRecord > Add Patient > Faculty > Add Faculty
Breadcrumbs::for('patientRecord.addfaculty', function (BreadcrumbTrail $trail) {
    $trail->parent('patientRecord');
    $trail->push('Faculty', route('addFaculty'));
    $trail->push('Add Faculty', route('addFaculty'));
});

// patientRecord > Add Patient > Staff > Add Staff
Breadcrumbs::for('patientRecord.addstaff', function (BreadcrumbTrail $trail) {
    $trail->parent('patientRecord');
    $trail->push('Staff', route('addStaff'));
    $trail->push('Add Staff', route('addStaff'));
});

// patientRecord > Add Patient > Extension > Add Extension
Breadcrumbs::for('patientRecord.addextension', function (BreadcrumbTrail $trail) {
    $trail->parent('patientRecord');
    $trail->push('Extension', route('addExtension'));
    $trail->push('Add Extension', route('addExtension'));
});
