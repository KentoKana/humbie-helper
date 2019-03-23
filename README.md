# Humbie Helper
## Version 1.0

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

## Milestones (Last update: March 21 2019)

### Kento
### - Added student registration
- A student can register through the form available on add-student.php.
- Server-side validation is implemented on the registration fields.
- Can view a list of all the students registered.

### -Login Feature
- Once registered, it allows the user to login through the home page.
- Validation added to the login form.
- If username and password match, the user will be redirected to the profile view.
- Server-side session is set once the user successfully logs in.
- If there is no match between the user and the password, the user will be redirected back to the login form with an error message.

### - Jenna
### - Project Feature
- Once a student is registered and logged in they can then create a project.
- Students can view a list of all the projects they are tied too on their profile page (This page needs to be moved to there eventually)
- Students can click on a project to be taken to the project details page
- On the project details page students can add multiple other students to their project at one time
- Students can also view the project details and edit or delete their project from this page.

### Mark
### - Agenda Feature
- Login Credentials:
- username: porkalmighty
- password: 123456

- adding an agenda is currently tied to my account id (7) because of session bug.
- CRUD is working properly
- can view the student's agendas tied to the project
- When agenda title is not specified when adding or deleting an agenda, it will return an error
- Deleting an agenda doesn't actually delete the entry, it will only set isArchived status to 1(True)
- Email function is not yet implemented
