# Humbie Helper
## Version 1.0
<img src="https://github.com/2019-Winter-HTTP-5202-0NB/project-backstreet-boys-and-jenna/blob/master/assets/images/Humbie.png" alt="Humbie Logo" width="150">


## A helper for students of Humber College Web Development Program!

### Developers

- Jenna G.
- Roentgen Mark M.
- Kento K.
- Ryan R.

### Current Bugs
- ~~Session not persisting~~ FIXED
- Mysql Server Error : Mysql has gone away
  - I already reported this bug in my hosting (Mark)

### Bug fixes
- Project ID session is immediately set after creating a project.
    - Kento, March 30 2019

## What this project is

Humbie Helper is a web application specifically created to help the future students of Humber College Web Development Program. You can:
- Register
- Create a project workspace for you and other group members
- Sort and save tasks
- Track your timesheet for tasks
- Give you a motivational quote when you're feeling down
- And many more things!

The app is currently in the development stage. Please read the "Milestones" section for more details.

## Milestones (Last update: April 2 2019)

### Kento

### - Started populating the Tools tab in project-details view.
- Students now have access to the agenda tool through the tools tab.

### - Added deadlines feature
- Student who has access to a specific can see, add, edit, and delete the project specific deadlines through the project details page.

### - Added student registration
- A student can register through the form available on add-student.php.
- Server-side validation is implemented on the registration fields.
- Can view a list of all the students registered.
- Once a user registers, they are automatically signed in as that registered user.
- Added logic to allow users to edit their profile, except for their username.
    - If password is left blank in the edit page, the previous password is kept.
    - If there is a new password present in the field, the new password is set.

### - Login feature
- Once registered, it allows the user to login through the home page.
- Validation added to the login form.
- If username and password match, the user will be redirected to the profile view.
- Server-side session is set once the user successfully logs in.
- If there is no match between the user and the password, the user will be redirected back to the login form with an error message.


### - Dynamic navigation feature
- The navigation dynamically changes based on the user's login status.
- If logged in:
    - The "Register" navigation link is replaced with "Hello, [username]".
    - The "Log In" navigation link is replaced with "Log Out".

### -Basic routing/restrictions based on sessoins
- Added logic for basic restrictions based on the login status.
- If user is not logged in, they are prohibited from accessing certain pages such as the user profile view.
- If user is logged in, they will be redirected to the user profile view if they try to navigate to the login page again.


### Jenna
### - Project feature
- Once a student is registered and logged in they can then create a project.
- Students can view a list of all the projects they are tied too on their profile page
- Students can click on a project to be taken to the project details page
- On the project details page students can add multiple other students to their project at one time.
- Students cannot add the same student to a project multiple times (Fixed on March 28)
- Students can also view the project details and edit or delete their project from this page. (Added on March 28)
- Add and edit project now validates against empty fields.

### - Notes feature
- Students can add notes to their project.
- Add and edit notes currently validate against empty fields.
- Add and edit notes make use of CK Editor to allow for rich text styling. CK Editor saves
formatting to the database and returns formatting when a single note is viewed.
- Students can view, edit and delete all notes related to the project page they are currently
on.

### Mark
### - Minutes feature
- Removed json_encode as a way to process data for CREATE, UPDATE, and VIEW. I used a WYSIWG editor instead to give more freedom to users.
- Deleting the agenda deletes the entry permanently, Removed isArchived Flag

### - Agenda feature
- Login Credentials:
- username: porkalmighty
- password: 123456

- adding an agenda is currently tied to my account id (7) because of session bug.
- CRUD is working properly
- can view the student's agendas tied to the project
- When agenda title is not specified when adding or deleting an agenda, it will return an error
- Deleting an agenda doesn't actually delete the entry, it will only set isArchived status to 1(True)
- Email function is not yet implemented

### Ryan
### - Motivational Quotes Feature
- CRUD for quotes, this would be for admin (Could add quote management to student profile section).
- Next step: Have a quote from the database display on student's project view and input validation.

### - Announcements Feature
- This will be part of the projects feature
- A list of all announcements for a particular project will be displayed in project details
- Currently signed in student would be able to edit and delete only their own announcements from list
- Views have been made, working on model and controller
