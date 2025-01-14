<?php

@include 'config.php';

if(isset($_POST['submit'])){ 
    $StudentName = $_POST['StudentName'];
    $StudentMobileNo = $_POST['StudentMobileNo'];
    $dob = $_POST['dob'];
    $StudentEmailId = $_POST['StudentEmailId'];
    $EmisId = $_POST['EmisId'];
    $Salutation = $_POST['Salutation'];
    $Gender = $_POST['Gender'];
    $BloodGroup = $_POST['BloodGroup'];
    $Nationality = $_POST['Nationality'];
    $Religion = $_POST['Religion'];
    $Caste = $_POST['Caste'];
    $AadhaarNumber = $_POST['AadhaarNumber'];
    $Community = $_POST['Community'];
    $FirstGraduate = $_POST['FirstGraduate'];
    $SpecialAdmissionQuota = $_POST['SpecialAdmissionQuota'];
    $DifferentlyAbled = $_POST['DifferentlyAbled'];
    $counsellingNumber = $_POST['counsellingNumber'];
    $RegistrationNumber = $_POST['RegistrationNumber'];

    //Current Academic info
    $AcademicYearJoining = $_POST['AcademicYearJoining'];
    $StreamType = "Engineering and Technology";
    $CourseType = $_POST['CourseType'];
    $Course = $_POST['Course'];
    $Branch = $_POST['Branch'];
    $MediumOfInstruction = $_POST['MediumOfInstruction'];
    $ModeOfStudy = $_POST['ModeOfStudy'];
    $DateOfAdmission = $_POST['DateOfAdmission'];
    $TypeOfAdmission = $_POST['TypeOfAdmission'];
    $LateralEntry = $_POST['LateralEntry'];
    $Hosteller = $_POST['Hosteller'];

    //Educational Details
    $SeekingAdmissionFor = $_POST['SeekingAdmissionFor'];
    if($_POST['UGSchoolName10']){
       $SchoolName10 = $_POST['UGSchoolName10'];
    }else if($_POST['LESchoolName10']){
       $SchoolName10 = $_POST['LESchoolName10'];
    }else{
       $SchoolName10 = $_POST['PGSchoolName10'];
    }

    if($_POST['BoardUG']){
       $Board10 = $_POST['BoardUG'];
    }else if($_POST['BoardLE']){
       $Board10 = $_POST['BoardLE'];
    }else{
       $Board10 = $_POST['BoardPG'];
    }

    if($_POST['UGSchoolName12']){
       $SchoolName12 = $_POST['UGSchoolName12'];
    }else if($_POST['LESchoolName12']){
       $SchoolName12 = $_POST['LESchoolName12'];
    }else{
       $SchoolName12 = $_POST['PGSchoolName12'];
    }

    if($_POST['UGMediumOfInstruction10']){
       $MediumOfInstruction10 = $_POST['UGMediumOfInstruction10'];
    }else if($_POST['LEMediumOfInstruction10']){
       $MediumOfInstruction10 = $_POST['LEMediumOfInstruction10'];
    }else{
       $MediumOfInstruction10 = $_POST['PGMediumOfInstruction10'];
    }
    
    if($_POST['UGTotalMark10']){
       $TotalMark10 = $_POST['UGTotalMark10'];
      }else if($_POST['LETotalMark10']){
         $TotalMark10 = $_POST['LETotalMark10'];
      }else{
         $TotalMark10 = $_POST['PGTotalMark10'];
      }
      
      if($_POST['UGTotalMark12']){
         $TotalMark12 = $_POST['UGTotalMark12'];
      }else if($_POST['LETotalMark12']){
         $TotalMark12 = $_POST['LETotalMark12'];
      }else{
         $TotalMark12 = $_POST['PGTotalMark12'];
      }
      
      if($_POST['UGMediumOfInstruction12']){
         $MediumOfInstruction12 = $_POST['UGMediumOfInstruction12'];
      }else if($_POST['LEMediumOfInstruction12']){
         $MediumOfInstruction12 = $_POST['LEMediumOfInstruction12'];
      }else{
         $MediumOfInstruction12 = $_POST['PGMediumOfInstruction12'];
      }
      
      if($_POST['Group12UG']){
         $Group12 = $_POST['Group12UG'];
      }else if($_POST['Group12LE']){
         $Group12 = $_POST['Group12LE'];
      }else{
         $Group12 = $_POST['Group12PG'];
      }

      $MathsMark = $_POST['MathsMark'];
      $PhysicsMark = $_POST['PhysicsMark'];
      $ChemistryMark = $_POST['ChemistryMark'];
      $RegisterNo12 = $_POST['RegisterNo12'];
      $CutOff = $_POST['CutOff'];
      if($_POST['NameOfDiplomaCourseLE']){
         $NameOfDiplomaCourse = $_POST['NameOfDiplomaCourseLE'];
      }else{
         $NameOfDiplomaCourse = $_POST['NameOfDiplomaCoursePG'];
      }
      if($_POST['NameOfDiplomaCollegeLE']){
         $NameOfDiplomaCollege = $_POST['NameOfDiplomaCollegeLE'];
      }else{
         $NameOfDiplomaCollege = $_POST['NameOfDiplomaCollegePG'];
      }
      if($_POST['PercentageDiplomaLE']){
         $PercentageDiploma = $_POST['PercentageDiplomaPG'];
      }else{
         $PercentageDiploma = $_POST['PercentageDiplomaPG'];
      }
      // $NameOfDiplomaCourse = $_POST['NameOfDiplomaCourse'];
      // $NameOfDiplomaCollege = $_POST['NameOfDiplomaCollege'];
      // $PercentageDiploma = $_POST['PercentageDiploma'];
      $NameOfUGCollege = $_POST['NameOfUGCollege'];
      $NameOfUGCourse = $_POST['NameOfUGCourse'];
      $CGPA = $_POST['CGPA'];
      $Sport = $_POST['Sport'];
      $SportName = $_POST['SportName'];
      $SportLevel = $_POST['SportLevel'];

    //Family Information
    $FatherName = $_POST['FatherName'];
    $FatherOccupation = $_POST['FatherOccupation'];
    $ParentsMobileNumber = $_POST['ParentsMobileNumber'];
    $MotherName = $_POST['MotherName'];
    $MotherOccupation = $_POST['MotherOccupation'];
    $Orphan = $_POST['Orphan'];
    $GuardianName = $_POST['GuardianName'];
    $AnnualFamilyIncome = $_POST['AnnualFamilyIncome'];

   //Permanent Address
    $P_Country = $_POST['P_Country'];
    if ($_POST['P_State'] == "OTHER STATES"){
        $P_State = $_POST['P_OtherStateName'];
        $P_District = $_POST['P_OtherDistrictName'];
    }
    else{
       $P_State = $_POST['P_State'];
       $P_District = $_POST['P_District'];
    }
    $P_LocationType = $_POST['P_LocationType'];
    $P_Taluk = $_POST['P_Taluk'];
    $P_Village = $_POST['P_Village'];
    $P_Block = $_POST['P_Block'];
    $P_Pincode = $_POST['P_Pincode'];
    $P_VillagePanchayat = $_POST['P_VillagePanchayat'];
    $P_PostalAddress = $_POST['P_PostalAddress'];

   //Commnication Address
   $C_Country = $_POST['C_Country'];
   if ($_POST['C_State'] == "OTHER STATES"){
    $C_State = $_POST['C_OtherStateName'];
    $C_District = $_POST['C_OtherDistrictName'];
   }
   else{
    $C_State = $_POST['C_State'];
    $C_District = $_POST['C_District'];
   }
   $C_LocationType = $_POST['C_LocationType'];
   $C_Taluk = $_POST['C_Taluk'];
   $C_Village = $_POST['C_Village'];
   $C_Block = $_POST['C_Block'];
   $C_Pincode = $_POST['C_Pincode'];
   $C_VillagePanchayat = $_POST['C_VillagePanchayat'];
   $C_PostalAddress = $_POST['C_PostalAddress'];

   //Bank Account Details
   $AccountNumber = $_POST['AccountNumber'];
   $IfscCode = $_POST['IfscCode'];
   $BankName = $_POST['BankName'];
   $BankBranch = $_POST['BankBranch'];
   $City = $_POST['City'];

   $select = "SELECT * FROM umis WHERE StudentMobileNo = '$StudentMobileNo' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){
      header('location:admission.php');
      $update = "UPDATE umis SET 
    StudName = '$StudentName',
    StudDOB = '$dob',
    StudEmailID = '$StudentEmailId',
    EmisId = '$EmisId',
    Salutation = '$Salutation',
    Gender = '$Gender',
    BloodGroup = '$BloodGroup',
    Nationality = '$Nationality',
    Religion = '$Religion',
    Caste = '$Caste',
    AadhaarNumber = '$AadhaarNumber',
    Community = '$Community',
    FirstGraduate = '$FirstGraduate',
    SpecialAdmissionQuota = '$SpecialAdmissionQuota',
    DifferentlyAbled = '$DifferentlyAbled',

    AcademicYearJoining = '$AcademicYearJoining',
    Streamtype = '$StreamType',
    CourseType = '$CourseType',
    Course = '$Course',
    Branch = '$Branch',
    MediumOfInstruction = '$MediumOfInstruction',
    ModeOfStudy = '$ModeOfStudy',
    DateOfAdmission = '$DateOfAdmission',
    TypeOfAdmission = '$TypeOfAdmission',
    LateralEntry = '$LateralEntry',
    Hosteller = '$Hosteller',

    SeekingAdmissionFor = '$SeekingAdmissionFor',
    SchoolName10 = '$SchoolName10',
    Board10 = '$Board10',
    MediumOfInstruction10 = '$MediumOfInstruction10',
    TotalMark10 = '$TotalMark10',
    SchoolName12 = '$SchoolName12',
    MediumOfInstruction12 = '$MediumOfInstruction12',
    Group12 = '$Group12',
    MathsMark = '$MathsMark',
    PhysicsMark = '$PhysicsMark',
    ChemistryMark = '$ChemistryMark',
    RegisterNo12 = '$RegisterNo12',
    TotalMark12 = '$TotalMark12',
    CutOff = '$CutOff',
    NameOfDiplomaCourse = '$NameOfDiplomaCourse',
    NameOfDiplomaCollege = '$NameOfDiplomaCollege',
    PercentageDiploma = '$PercentageDiploma',
    NameOfUGCollege = '$NameOfUGCollege',
    NameOfUGCourse = '$NameOfUGCourse',
    CGPA = '$CGPA',
    Sport = '$Sport',
    SportName = '$SportName',
    SportLevel = '$SportLevel',
    counsellingNumber = '$counsellingNumber',
    RegistrationNumber = '$RegistrationNumber',
    FatherName = '$FatherName',
    FatherOccupation = '$FatherOccupation',
    ParentsMobileNumber = '$ParentsMobileNumber',
    MotherName = '$MotherName',
    MotherOccupation = '$MotherOccupation',
    Orphan = '$Orphan',
    GuardianName = '$GuardianName',
    AnnualFamilyIncome = '$AnnualFamilyIncome',

    P_Country = '$P_Country',
    P_State = '$P_State',
    P_District = '$P_District',
    P_LocationType = '$P_LocationType',
    P_Taluk = '$P_Taluk',
    P_Village = '$P_Village',
    P_Block = '$P_Block',
    P_Pincode = '$P_Pincode',
    P_VillagePanchayat = '$P_VillagePanchayat',
    P_PostalAddress = '$P_PostalAddress',

    C_Country = '$C_Country',
    C_State = '$C_State',
    C_District = '$C_District',
    C_LocationType = '$C_LocationType',
    C_Taluk = '$C_Taluk',
    C_Village = '$C_Village',
    C_Block = '$C_Block',
    C_Pincode = '$C_Pincode',
    C_VillagePanchayat = '$C_VillagePanchayat',
    C_PostalAddress = '$C_PostalAddress',

    AccountNumber = '$AccountNumber',
    IfscCode = '$IfscCode',
    BankName = '$BankName',
    BankBranch = '$BankBranch',
    City = '$City'
   WHERE StudentMobileNo = '$StudentMobileNo'";

   mysqli_query($conn, $update);
    header('location:admission.php');

   }else{
      $insert = "INSERT INTO umis (
         StudName, 
         StudentMobileNo, 
         StudDOB, 
         StudEmailID, 
         EmisId, 
         Salutation,
         Gender, 
         BloodGroup, 
         Nationality, 
         Religion, 
         Caste, 
         AadhaarNumber, 
         Community, 
         FirstGraduate, 
         SpecialAdmissionQuota, 
         DifferentlyAbled,
         
         
         AcademicYearJoining,
         Streamtype,
         CourseType,
         Course,
         Branch,
         MediumOfInstruction,
         ModeOfStudy,
         DateOfAdmission,
         TypeOfAdmission,
         LateralEntry,
         Hosteller,

         SeekingAdmissionFor,
         SchoolName10,
         Board10,
         MediumOfInstruction10,
         TotalMark10,
         SchoolName12,
         MediumOfInstruction12,
         Group12,
         MathsMark,
         PhysicsMark,
         ChemistryMark,
         RegisterNo12,
         TotalMark12,
         CutOff,
         NameOfDiplomaCourse,
         NameOfDiplomaCollege,
         PercentageDiploma,
         NameOfUGCollege,
         NameOfUGCourse,
         CGPA,
         Sport,
         SportName,
         SportLevel,

         FatherName, 
         FatherOccupation, 
         ParentsMobileNumber, 
         MotherName, 
         MotherOccupation, 
         Orphan, 
         GuardianName, 
         AnnualFamilyIncome, 

         P_Country, 
         P_State, 
         P_District, 
         P_LocationType, 
         P_Taluk, 
         P_Village, 
         P_Block, 
         P_Pincode,
         P_VillagePanchayat, 
         P_PostalAddress, 

         C_Country, 
         C_State, 
         C_LocationType, 
         C_District, 
         C_Taluk, 
         C_Village, 
         C_Block,
         C_Pincode, 
         C_VillagePanchayat, 
         C_PostalAddress,
          
         AccountNumber,
         IfscCode, 
         BankName, 
         BankBranch, 
         City,

         counsellingNumber,
         RegistrationNumber
     ) VALUES (
        '$StudentName',
        '$StudentMobileNo',
        '$dob',
        '$StudentEmailId',
        '$EmisId',
        '$Salutation',
        '$Gender',
        '$BloodGroup',
        '$Nationality',
        '$Religion',
        '$Caste',
        '$AadhaarNumber',
        '$Community',
        '$FirstGraduate',
        '$SpecialAdmissionQuota',
        '$DifferentlyAbled',

        '$AcademicYearJoining',
        '$StreamType',
        '$CourseType',
        '$Course',
        '$Branch',
        '$MediumOfInstruction',
        '$ModeOfStudy',
        '$DateOfAdmission',
        '$TypeOfAdmission',
        '$LateralEntry',
        '$Hosteller',

        '$SeekingAdmissionFor',
        '$SchoolName10',
        '$Board10',
        '$MediumOfInstruction10',
        '$TotalMark10',
        '$SchoolName12',
        '$MediumOfInstruction12',
        '$Group12',
        '$MathsMark',
        '$PhysicsMark',
        '$ChemistryMark',
        '$RegisterNo12',
        '$TotalMark12',
        '$CutOff',
        '$NameOfDiplomaCourse',
        '$NameOfDiplomaCollege',
        '$PercentageDiploma',
        '$NameOfUGCollege',
        '$NameOfUGCourse',
        '$CGPA',
        '$Sport',
        '$SportName',
        '$SportLevel',

        '$FatherName',
        '$FatherOccupation',
        '$ParentsMobileNumber',
        '$MotherName',
        '$MotherOccupation',
        '$Orphan',
        '$GuardianName',
        '$AnnualFamilyIncome',

        '$P_Country',
        '$P_State',
        '$P_District',
        '$P_LocationType',
        '$P_Taluk',
        '$P_Village',
        '$P_Block',
        '$P_Pincode',
        '$P_VillagePanchayat',
        '$P_PostalAddress',

        '$C_Country',
        '$C_State',
        '$C_District',
        '$C_LocationType',
        '$C_Taluk',
        '$C_Village',
        '$C_Block',
        '$C_Pincode',
        '$C_VillagePanchayat',
        '$C_PostalAddress',

        '$AccountNumber',
        '$IfscCode',
        '$BankName',
        '$BankBranch',
        '$City',

         '$counsellingNumber',
         '$RegistrationNumber'

     )";
     
    mysqli_query($conn, $insert);
    header('location:admission.php');
    }

};

?>