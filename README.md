![image](https://github.com/ainlizam/QuranBookingSystem/assets/170220596/9cc21e92-bb15-4e34-8822-e16825d3735d)


## KULLIYYAH OF INFORMATION & COMMUNICATION TECHNOLOGY

## SEMESTER 1, 2024/2025

## INFO 3305 -- WEB APPLICATION DEVELOPMENT

## FINAL REPORT

### SECTION: SECTION 01

### TITLE PROJECT: HOSPITAL MANAGEMENT SYSTEM

### GROUP: GROUP A

### PREPARED BY:

  -----------------------------------------------------------------------
  **NAME**                                          **MATRIC NO.**        **CONTRIBUTION** 
  ------------------------------------------------- ---------------------
  ADLYN SOFEA BINTI MOHD ARIFF ADIKA                   (2214042)             Medical Page

  NUR FATNIN IZZATI BINTI SIDIK                        (2110294)            Appointment Page

  WAN MUHAMMAD ARIF BIN WAN AZMAN                      (2212119)            Doctors Page

  MUHAMMAD FIRDAUS BIN ZAINI                           (2217753)            Patient Page

  NURAIN IZZATI BINTI ABD RAUF                         (2217978)            Billing Page

  SULTAN ARIFFIN BIN KAMAL                             (2218433)            Pharmacy,Register Page
  
  -----------------------------------------------------------------------

**LECTURER**

DR KHAIRUL AZMI

**DUE**

15/01/2025

**Table of Contents**

<ins>**1. INTRODUCTION OF THE PROPOSED WEB APPLICATION**</ins>

<ins>**2. OBJECTIVES OF THE PROPOSED WEB APPLICATION**</ins>

<ins>**3. FEATURES AND FUNCTIONALITIES OF THE PROPOSED WEB APPLICATION**</ins>

> 3.1 Home Page 
>
> 3.2 User Authentication 
>
> 3.3 Model from Each Team Members
> > 3.3.1 Patient Registration
> >
> > 3.3.2 Appointment Scheduling
> >
> > 3.3.3 Billing and Invoice
> >
> > 3.3.4 Medical Records
> >
> > 3.3.5 Doctor Management
> >
> > 3.3.6 Pharmacy Management

<ins>**4. SEQUENCE DIAGRAM**</ins>

<ins>**5. PROJECT SYSTEM CAPTURED SCREEN AND EXPLANATION**</ins>

<ins>**6. CHALLENGES/DIFFICULTIES IN DEVELOPING THE APPLICATION**</ins>
#  

# 1. INTRODUCTION OF THE PROPOSED WEB APPLICATION

**Project Name:** Hospital Management System

The \'Hospital Management System\' is a web-based platform that will helps the hospital's administrator to  manage the hospital's database efficiently and seamlessly. This platform seeks efficiency in the hospital management by offering a robust back-end coding and friendly interface. By focusing on key functions like registration of patient, medical record management and doctor and pharmacy record management, the system improves the administrative experience of hospital management by enhancing user experience and manage data of the hospital efficiently. The hospital that we choosen as the pilot test is the Hospital Kuala Lumpur(HKL) to make sure our web application system is as close as the real world system and could be implemented in the future.

# 2. OBJECTIVES OF THE WEB APPLICATION

The objective of the hospital management system website is to provide a comprehensive, user-friendly platform that efficiently manages hospital operations. It offers features such as a dynamic home page, secure user authentication, seamless patient registration, easy appointment scheduling, integrated billing and invoice systems, organized medical records management, doctor and pharmacy management, and a feedback and rating system to enhance patient satisfaction. This system aims to improve healthcare service delivery, optimize administrative tasks, and foster effective communication between patients, doctors, and hospital staff.

## 2.1 Easy Appointment and Patient Registration

Simplifies the process for patients to register and schedule appointments, reducing wait times and improving convenience.

## 2.2 Organized Medical Records and Billing

Keeps patient records and billing information in one place, making it easier for staff to manage and for patients to pay their bills.

## 2.3 Efficient Communication Between Patients and Staff

Facilitates smooth communication between doctors and hospital staff, ensuring better coordination and quicker response times.

# 3. FEATURES AND FUNCTIONALITIES OF THE PROPOSED WEB APPLICATION

## 3.1 User Authentication

- Users need to log in with the registered email and password. 
- The registration page allows new users to sign up.


## 3.2 Home Page

The home page serves as the welcoming interface for users. It includes:

- Background Information: Details about the hospital
- Key Highlights: Overview of the vission and mission of the hospital
- Call-to-Action Buttons: Direct access to functionalities such as 'Pharmacy','Doctors','Appointment'


## 3.3 Patient Registration

- Manage patient information, including creating, updating, viewing, and deleting patient records.  
- Collect essential details like name, contact info, address, date of birth, and medical history.  
- Patients are registered by the staff.  

Key Features:  
- CRUD operations for patient profiles.  
- Search and filter patients by name, ID, or contact number.  
- Integration with other modules for seamless data sharing (e.g., appointments, medical records).  


## 3.4 Appointment Scheduling

- Allow patients to book appointments with doctors based on availability.  
- Shows the appointment slots including the completed one.
Key Features:  
- CRUD operations for appointments.  
- Real-time doctor availability checks.  
- Allow rescheduling or cancellation of appointments.  


## 3.5 Billing and Invoice

- Generate bills for consultations, treatments, or services.  
- Track payment status (paid, unpaid, or pending).  
- Provide detailed billing breakdowns for transparency.  

Key Features:  
- Invoice generation with detailed billing breakdown.  
- Integration with the medical records module to fetch treatment costs.  
- Clear display of payment status for tracking purposes.


## 3.6 Medical Records

- Store and manage patients’ medical history, including prescriptions, lab reports, and diagnoses.  
- Provide access to authorized personnel (e.g., doctors).  

Key Features:  
- Secure upload and retrieval of medical documents.  
- Allow doctors to add notes or update patient records.  
- Ensure data confidentiality and compliance with healthcare regulations.  


## 3.7 Doctor Management

- Manage doctor profiles, including personal details, specializations, and availability.  
- Display available doctors for patient appointment booking.  

Key Features:  
- CRUD operations for doctor profiles.  
- Doctor availability scheduling and leave management.  
- Search and filter doctors by specialization or availability. 

## 3.8 Pharmacy Management

- Manage prescriptions and available medications.
- Maintain stock levels for medicines includes updatable records.
- Includes manufactured date and expiry date.

Key Features:
- CRUD Operations for Pharmacy Management Module


# 4. SEQUENCE DIAGRAM

## 4.1 Sequence Diagram
![sequence diagram](https://github.com/user-attachments/assets/95cc3c68-e912-4ab1-a930-5d7da88d25a0)


# 5. PROJECT SYSTEM CAPTURED SCREEN AND EXPLANATION

## 5.1 Authentication Page

![Authentication Page](https://github.com/user-attachments/assets/c6953c87-606c-4c39-ba51-097805ad73fa)

This page requires the admin to enter their username and password to login into the system
to register patient,update appointment and etc.

## 5.2 Home Page

![HOME - sultan (2)](https://github.com/user-attachments/assets/081c2262-06b5-4d2f-b94c-2d2014cabc61)


Admins could see the Homepage of the system with navigation bar on top of the page with
selection of menu such as doctors,appointment,invoice,pharmacy and etc.

## 5.3 Patient Registration Page

![patient](https://github.com/user-attachments/assets/5c5f2cd8-866a-4974-9eee-5a1a8907af36)

This page will show the user/administrator the patient list, registeration and administrator can manage the list by CRUD operation.
User/administrator of the hospital can input the details of the patient. Click submit button to create a new patient record. 
"Pencil" icon is for Edit and "Trashbin" icon is for delete.

![add patient](https://github.com/user-attachments/assets/9b864a35-b0c9-4430-a263-b3814e8f5ec3)

The administrator need to fill all the needed information of the patient and click "add patient" button to register new patient records.

![update patient](https://github.com/user-attachments/assets/fe633b96-d085-4a36-a436-2a4ef3cfaf84)

After clicking "Pencil" icon, the administrator will be redirect to this interface to edit or update the patient's information.
The Patient ID cannot be change is it is the primary key for the patient records.

![delete patient](https://github.com/user-attachments/assets/23b00c63-17a8-4c6b-a1b8-ac2ed1c7cd02)

After clicking the "Trashbin" button, tthe administrator will be prompt to cofirm the deletion action of the patient's records.


## 5.4 Appointment Scheduling Page
![add appointment-fatnin](https://github.com/user-attachments/assets/c482bac3-2635-48de-bf68-0b651e3595aa)

![view appointmnet-fatnin](https://github.com/user-attachments/assets/2543f760-6c76-4d18-8676-ac55e9b9aa9b)

![update appointment-fatnin](https://github.com/user-attachments/assets/1a84d703-af0c-4cea-b4e2-6044e9eb0889)

![delete appointment-fatnin](https://github.com/user-attachments/assets/cdb91c5d-9df7-4bb3-8fe1-d4fefde383a0)


Admin of the hospital can input the details of the appointment through appointment record.
The Appointment page will display appointment form details on the table such as
appointment id, doctor id, appointment date, and appointment time.
Admins is allowed to add, view, update or delete appointment details.

## 5.5 Billing and Payment Page

a. Create invoice page
    
Admin can select patient name from patient table to create a new invoice after they receive treatment or medication from the hospital
![createinvoice1](https://github.com/user-attachments/assets/33c6a47f-c766-4899-9eab-be467cdf121c)
![createinvoice2](https://github.com/user-attachments/assets/d4b7f514-f75a-44ed-a49e-b8173ac748de)

b. Read invoice page
    
The billing list have 3 action that admin can perform which is read/print, update/edit the invoice and delete the invoice. 

![billinglist1](https://github.com/user-attachments/assets/c703178d-60f7-4a8e-9faf-67f3b7ca68e7)

![billing-list2](https://github.com/user-attachments/assets/b3102c8a-fd95-4b28-b88e-7438fbb80c17)

![showinvoice1](https://github.com/user-attachments/assets/b22cbeb7-9338-44ca-a3ad-07c5a6ffdb29)

![showinvoice2](https://github.com/user-attachments/assets/5adcdbba-f7c6-412f-bc5b-5bbf7c04ed31)

c. Update invoice page
    
Admin can update or edit the existing invoice with the latest information that need to be updated.
![editinvoice1](https://github.com/user-attachments/assets/74d95293-78e9-499d-b3ff-2d6f1100e026)
![editinvoice2](https://github.com/user-attachments/assets/c01cfa03-61bb-4b61-b359-f7f86ef8856c)
![billinglist1](https://github.com/user-attachments/assets/c703178d-60f7-4a8e-9faf-67f3b7ca68e7)
Updated billing list will be shown after the admin click the update invoice button
d. Delete invoice page
    Admin can directly delete the invoice from the billing list instead of delete it on the myphpadmin database.

## 5.6 Medical Records Page

![medical](https://github.com/user-attachments/assets/c2e8d3d2-ba20-43b3-a0e5-d63fc3c83ac7)


This is the medical page. User can navigate to all departments (Dentistry, Cardiology, ENT Specialist, Orthopaedic, Pulmonology, and Blood Screening).
If user wants to view record, simply click on the 'View Record' button.


![view-medical](https://github.com/user-attachments/assets/6fbede11-448e-441b-8f2a-33f22997ed33)


The page will navigate to the Dentistry records. If user wants to add a new record, simply click on the 'Add Record' button. We already added 10 records for the Dentistry Department.


![edit-medical](https://github.com/user-attachments/assets/f73c6c5e-1270-494c-a902-ab9e73e70124)


To edit the record, simply click on the pencil icon under the Action column. User can simply edit the record by filling in the form. For this example, we want to edit the doctor's name.


![editted-medical](https://github.com/user-attachments/assets/4a904339-1b37-459f-ba9f-7c43b3d91025)


User successfully editted the doctor's name.


![delete-medical](https://github.com/user-attachments/assets/0803c315-781b-425f-ba6c-d8cf1fee6319)


To delete the record, simply click on the trash can icon under the Action column. A pop-up message will appear to ask user for the clarification before deleting the record. In this example, we want to delete record 10.


![deleted-medical](https://github.com/user-attachments/assets/e08d5698-159c-4658-8ea6-2694a744c42b)


Record 10 successfully deleted. 



## 5.7 Doctor Management Page

![Doctor View and Delete - arif](https://github.com/user-attachments/assets/a95b9791-0794-478e-8395-dd8120cb5747)

Clicking Doctor button in Home page will redirect Admin to this Doctor page which display the Doctor table. This page also include Add doctor button to add doctor details, Edit icon to edit doctor details and Delete icon to delete doctor details. 

![Doctor Add - arif](https://github.com/user-attachments/assets/7b208519-488d-4b75-819b-4523cb744b1a)

Clicking Add doctor button will redirect Admin to the Add Doctor page that has a form for Admin to insert doctor details.

![Doctor Edit - arif](https://github.com/user-attachments/assets/09a69d1b-fcf3-4d56-8aa5-80f0d3a1c3d1)

Clicking Edit icon will redirect Admin to the Edit page that has a form for Admin to edit doctor details.

## 5.8 Pharmacy Management Page

![PharmacyView](https://github.com/user-attachments/assets/c131b4b6-3141-46db-87cf-f59aff4dc4dd)

![PharmacyAdd](https://github.com/user-attachments/assets/bb58463f-760a-4b72-a7c9-814e4afe0241)

![PharmacyUpdate](https://github.com/user-attachments/assets/381a1cf8-08dd-4c48-aba5-cb3beb10fa54)

The Pharmacy Page will display the drugs details in a table with its manufactured date,
expiry date,quantity and price.Admin could add a new record of drugs,
update the record and delete the records.

# 6. CHALLENGES/DIFFICULTIES IN DEVELOPING THE APPLICATION

## 6.1 Authentication Page 

## 6.2 Home Page

## 6.3 Patient Registration Page 
### 1.Unable to view the views/interface at the browser.

**Solution** Download Git and make sure the project's file is cloned inside the xampp/htdocs folder.

###2.some errors with the database

***Solution*** Use the command ``` php artisan migrate:fresh ``` to drop all the table and migrate it again.

## 6.4 Appointment Scheduling Page 
### 1. Undefined Variables Due to Typos
Typos in route names ($appointment to $appointments) lead to undefined variable errors.


## 6.5 Billing and Invoice Page

## 6.6 Medical Records Page 
### 1. Undefined Variables Due to Typos
Typos in variable names ($medicals to $medical) lead to undefined variable errors.

**Solution:** Double-check variable names to ensure consistency throughout the code.

### 2. Not Running the Migration
Skipping the database migration prevents changes from reflecting in the database, causing errors.

**Solution:** Always run php artisan migrate after making database changes.

## 6.7 Doctor Management Page

## 6.8 Pharmacy Management Page 
### 1. Undefined Variables Due to Typos
Typos when coding by changing from 'drug' to 'drugs'
### 2. Connection to PhpmyAdmin
My data did not updated in the phpmyAdmin database after many tries,after the help of internet,
I eventually solved it.

