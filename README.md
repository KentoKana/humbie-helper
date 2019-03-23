# Humbie Helper
## Version 1.0
<img src="https://github.com/2019-Winter-HTTP-5202-0NB/project-backstreet-boys-and-jenna/blob/master/assets/images/Humbie.png" alt="Humbie Logo" width="150">


## A helper for students of Humber College Web Development Program!

### Developers

- Jenna G.
- Roengten Mark M.
- Kento K.
- Ryan R.

### Current Bugs
- Session not persisting
- Mysql Server Error : Mysql has gone away
  - I already reported this bug in my hosting (Mark)

## What this project is

Humbie Helper is a web application specifically created to help the future students of Humber College Web Development Program. You can:
- Register
- Create a project workspace for you and other group members
- Sort and save tasks
- Track your timesheet for tasks
- Give you a motivational quote when you're feeling down
- And many more things!

The app is currently in the development stage. Please read the "Milestones" section for more details.

## Milestones (Last update: March 23 2019)

### Kento
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
- Students can view a list of all the projects they are tied too on their profile page (This page needs to be moved to there eventually)
- Students can click on a project to be taken to the project details page
- On the project details page students can add multiple other students to their project at one time
- Students can also view the project details and edit or delete their project from this page.

### Mark
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
