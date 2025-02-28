# internshala-blood-bank

## Task - Design a simple 'Blood bank' web application

Assume you are designing a real-life system, that will be used by real users.

The application should contain 2 types of users: Hospitals and Receivers Pages to be developed-
‘Registration’ pages - Different registration pages for hospitals & receivers. Capture receiver’s blood
group during registration.

‘Login’ pages - Single/different login pages for hospitals & receivers.

Hospital ‘Add blood info’ page - A hospital, once logged in, should be able to add details of available
blood samples (along with type) to their bank. Access to this page should be restricted only to hospitals.
‘Available blood samples’ page - There should be a page that displays all the available blood samples
along with which hospital has them and a ‘Request Sample’ button. This page should be accessible to
everyone, irrespective of whether the user is logged in or not. Expected functionality on click of the
'Request Sample' button- Only receivers should be able to request for blood samples by clicking the
‘Request Sample’ button. Make sure that only those receivers who are eligible for the blood sample are
allowed to click the button. If the user is not logged in, then he/she should be redirected to the login
page. If a user is logged in as a hospital, then the user should not be allowed to request for a blood
sample.

Hospital ‘View requests’ page - Hospitals should be able to see the list of all the receivers who have
requested a particular blood group from its blood bank.

**Technologies:**
Please write the front-end in HTML/CSS/JS. You may use Bootstrap if you wish.
Please write the backend in either core PHP or PHP Codeigniter framework.
Use MySQL as the database.

Mainly, we want you to concentrate on the following things:
Neat & simple design Good database architecture Good coding practices (write readable, modular code)

**How to send:**
Please zip the assignment, upload on google drive and share the (publicly accessible) google drive link
only. Please make sure you include the SQL file so that we can replicate your database.


## Packages Used
- Bootstrap 4
- Now UI Kit
- jQuery
- Pace JS
- Popper JS
- Montserrat Google Font
- Fontawesome Icons
- CodeIgniter


## Setup
Clone the repository. Import blood-bank.sql, it will create new database with empty tables. Default database username:password is set to root with password blank. To set database configurations go to bloodbank_app>config>database.php and update the values.


## Notes
> Since it says assume that it will be used by real people, I wanted to add edit profile, forgot password types feature which I didn't implemented since this is a demo assignment.
> For frontend, I only used Now UI Kit but the page look is coded by myself.

## Internshala Application Status
- For anyone wondering my application status, I cleared assignment, technical and HR round. At last there was a meet with Mr. Vikas Shah, CTO, Internshala. He asked me about my two previous startups that I had and future goals to which I mentioned that I want to create something big after gaining experience and exposure next 4-5 years, to which, they disqualified me because they are looking for someone who will stay for longer.
