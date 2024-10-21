$(document).ready(function() {
    $('#StudentMobileNo').on('keyup', function() {
      fetchstudentdata();
    });
});


function updateCourseOptions(courseType) {

    if (courseType) {
        // Fetch courses based on courseType
        $.ajax({
            url: './autofill-php/get-courses.php', // Adjust URL to your server-side script
            type: 'GET',
            data: { CourseType: courseType },
            success: function(response) {
                try {
                    var courses = JSON.parse(response);
                    // console.log(courses);
                    if (courses.error) {
                        console.error(courses.error);
                    } else {
                        // Populate the Course dropdown
                        courses.forEach(function(course) {
                            $('#courseType').append(`<option value="${course.name}">${course.name}</option>`);
                        });
                    }
                } catch (e) {
                    console.error("Invalid JSON response");
                    console.error(response);
                }
            },
            error: function(xhr, status, error) {
                console.log("ERROR:");
                console.error('AJAX Error: ' + status + error);
            }
        });
    }
}

function updateBranchOptions(course) {

    if (course) {
        // Fetch courses based on courseType
        $.ajax({
            url: './autofill-php/get-branches.php', // Adjust URL to your server-side script
            type: 'GET',
            data: { Course: course },
            success: function(response) {
                try {
                    var Branches = JSON.parse(response);
                    // console.log(Branches);
                    if (Branches.error) {
                        console.error(Branches.error);
                    } else {
                        // Populate the Course dropdown
                        Branches.forEach(function(branch) {
                            $('#branch').append(`<option value="${branch.name}">${branch.name}</option>`);
                        });
                    }
                } catch (e) {
                    console.error("Invalid JSON response");
                    console.error(response);
                }
            },
            error: function(xhr, status, error) {
                console.log("ERROR:");
                console.error('AJAX Error: ' + status + error);
            }
        });
    }
}

function fetchstudentdata() {
  var StudentMobileNo = $('#StudentMobileNo').val();
  $.ajax({
      url: './update-autocomplete.php',
      type: 'GET',
      data: { StudentMobileNo: StudentMobileNo },
      success: function(response) {
          try {
              var data = JSON.parse(response);
              if (data.error) {
                  console.error(data.error);
                } else {
                    // console.log(data);
                    $('#StudentName').val(data.StudName);
                    $('#StudentEmailId').val(data.StudEmailID);
                    $('#dob').val(data.StudDOB);
                    $('#EmisId').val(data.EmisId);
                    $('#Salutation').val(data.Salutation);
                    $('#Gender').val(data.Gender);
                    $('#BloodGroup').val(data.BloodGroup);
                    $('#Nationality').val(data.Nationality);
                    $('#Religion').val(data.Religion);
                    $('#Caste').val(data.Caste);
                    $('#AadhaarNumber').val(data.AadhaarNumber);
                    $('#Community').val(data.Community);
                    if (data.FirstGraduate === "yes") {
                        $('#FirstGraduateYes').prop('checked', true);
                    } else if (data.FirstGraduate === "no") {
                        $('#FirstGraduateNo').prop('checked', true);
                    }
                    if (data.SpecialAdmissionQuota === "yes") {
                        $('#SpecialAdmissionQuotaYes').prop('checked', true);
                    } else if (data.FirstGraduate === "no") {
                        $('#SpecialAdmissionQuotaNo').prop('checked', true);
                    }
                    if (data.DifferentlyAbled === "yes") {
                        $('#DifferentlyAbledYes').prop('checked', true);
                    } else if (data.FirstGraduate === "no") {
                        $('#DifferentlyAbledNo').prop('checked', true);
                    }
                    //CURRENT ACADEMIC INFORMATION
                    $('#AcademicYearJoining').val(data.AcademicYearJoining);
                    $('#course').val(data.CourseType);
                    $('#course').trigger('change');
                    $('#courseType').val(data.Course);
                    $('#courseType').trigger('change');
                    $('#branch').val(data.Branch);
                    $('#MediumOfInstruction').val(data.MediumOfInstruction);
                    $('#ModeOfStudy').val(data.ModeOfStudy);
                    $('#DateOfAdmission').val(data.DateOfAdmission);
                    $('#Source').val(data.TypeOfAdmission);
                    $('#Source').trigger('change');
                    $('[name="' + counsellingNumber + '"]').val(data.counsellingNumber);
                    if (data.LateralEntry === "yes") {
                        $('#LateralEntry').prop('checked', true);
                    } else if (data.FirstGraduate === "no") {
                        $('#LateralEntry').prop('checked', true);
                    }
                    if (data.Hosteller === "yes") {
                        $('#Hosteller').prop('checked', true);
                    } else if (data.Hosteller === "no") {
                        $('#Hosteller').prop('checked', true);
                    }
                    $('#educationLevel').val(data.SeekingAdmissionFor);
                    educationLevel.dispatchEvent(new Event('change'));
                    var educationLevel1 = data.SeekingAdmissionFor;
                    if (educationLevel1 === 'UG'){
                        $.each({
                            UGSchoolName10: data.SchoolName10,
                            BoardUG: data.Board10,
                            UGMediumOfInstruction10: data.MediumOfInstruction10,
                            UGTotalMark10: data.TotalMark10,
                            UGSchoolName12: data.SchoolName12,
                            UGMediumOfInstruction12: data.MediumOfInstruction12,
                            UGTotalMark12: data.TotalMark12,
                            Group12UG: data.Group12,
                            PhysicsMark: data.PhysicsMark,
                            ChemistryMark: data.ChemistryMark,
                            MathsMark: data.MathsMark,
                            RegisterNo12: data.RegisterNo12,
                            TotalMark12: data.TotalMark12,
                            CutOff: data.CutOff
                        }, function(key, value) {
                            $('[name="' + key + '"]').val(value);
                        });
                    } else if (educationLevel1 === 'LE') {
                        $.each({
                            LESchoolName10: data.SchoolName10,
                            BoardLE: data.Board10,
                            LEMediumOfInstruction10: data.MediumOfInstruction10,
                            LETotalMark10: data.TotalMark10,
                            LESchoolName12: data.SchoolName12,
                            LEMediumOfInstruction12: data.MediumOfInstruction12,
                            LETotalMark12: data.TotalMark12,
                            Group12LE: data.Group12,
                            NameOfDiplomaCourse: data.NameOfDiplomaCourse,
                            NameOfDiplomaCollege: data.NameOfDiplomaCollege,
                            PercentageDiploma: data.PercentageDiploma
                        }, function(key, value) {
                            $('[name="' + key + '"]').val(value);
                        });
                    } else if (educationLevel1 === 'PG') {
                        $.each({
                            PGSchoolName10: data.SchoolName10,
                            BoardPG: data.Board10,
                            PGMediumOfInstruction10: data.MediumOfInstruction10,
                            PGTotalMark10: data.TotalMark10,
                            PGSchoolName12: data.SchoolName12,
                            PGMediumOfInstruction12: data.MediumOfInstruction12,
                            PGTotalMark12: data.TotalMark12,
                            Group12PG: data.Group12,
                            NameOfUGCollege: data.NameOfUGCollege,
                            NameOfUGCourse: data.NameOfUGCourse,
                            CGPA: data.CGPA
                        }, function(key, value) {
                            $('[name="' + key + '"]').val(value);
                        });
                    }

                    $('#Sport').val(data.Sport);
                    $('#SportName').val(data.SportName);
                    $('#SportLevel').val(data.SportLevel);
                    //FAMILY DETAILS
                    $('#FatherName').val(data.FatherName);
                    $('#FatherOccupation').val(data.FatherOccupation);
                    $('#ParentsMobileNo').val(data.ParentsMobileNumber);
                    $('#MotherName').val(data.MotherName);
                    $('#MotherOccupation').val(data.MotherOccupation);
                    $('#Orphan').val(data.Orphan);
                    $('#GuardianName').val(data.GuardianName);
                    $('#AnnualFamilyIncome').val(data.AnnualFamilyIncome);
                    //PERMANENT ADDRESS
                    $('#P_Country').val(data.P_Country);
                    const PerState = data.P_State;
                    // console.log('OK');
                    if (PerState === 'TAMIL NADU'){
                        $('#P_State').val(data.P_State);
                        $('#P_State').trigger('change');
                        $('#P_District').val(data.P_District);
                    } else{
                        $('#P_State').val("OTHER STATES");
                        $('#P_State').trigger('change');
                        $('#P_OtherStateName').val(data.P_State);
                        $('#P_OtherStateDistrictName').val(data.P_District)
                    }
                    $('#P_LocationType').val(data.P_LocationType);
                    $('#P_Taluk').val(data.P_Taluk);
                    $('#P_Village').val(data.P_Village);
                    $('#P_Block').val(data.P_Block);
                    $('#P_Pincode').val(data.P_Pincode);
                    $('#P_VillagePanchayat').val(data.P_VillagePanchayat);
                    $('#P_PostalAddress').val(data.P_PostalAddress);
                    //COMMUNICATION ADDRESS
                    $('#C_Country').val(data.C_Country);
                    const CurrState = data.C_State;
                    // console.log('OK');
                    if (CurrState === 'TAMIL NADU'){
                        $('#C_State').val(data.C_State);
                        $('#C_State').trigger('change');
                        $('#C_District').val(data.C_District);
                    } else{
                        $('#C_State').val("OTHER STATES");
                        $('#C_State').trigger('change');
                        $('#C_OtherStateName').val(data.C_State);
                        $('#C_OtherStateDistrictName').val(data.C_District)
                    }
                    $('#C_LocationType').val(data.C_LocationType);
                    $('#C_Taluk').val(data.C_Taluk);
                    $('#C_Village').val(data.C_Village);
                    $('#C_Block').val(data.C_Block);
                    $('#C_Pincode').val(data.C_Pincode);
                    $('#C_VillagePanchayat').val(data.C_VillagePanchayat);
                    $('#C_PostalAddress').val(data.C_PostalAddress);
                    //BANK
                    $('#AccountNumber').val(data.AccountNumber);
                    $('#IfscCode').val(data.IfscCode);
                    $('#BankName').val(data.BankName);
                    $('#BankBranch').val(data.BankBranch);
                    $('#City').val(data.City);
                    $('#registerNo').val(data.RegisterNo12);
                    $('#counsellingNumber').val(data.counsellingNumber);

              }
          } catch (e) {
                console.log(e);
                console.error("Invalid JSON response");
                console.error(response);
          }
      },
      error: function(xhr, status, error) {
          console.log("ERROR:");
          console.error('AJAX Error: ' + status + error);
      }
  });
}
