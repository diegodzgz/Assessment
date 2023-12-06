# Assessment
This module validates the user's first name and doesn't contain any whitespaces when the user creates a new account.

Validaiton:
In some countries, there are compound names, which can contain a hyphen or a whitespace. A regular expression was added to identify this type of name with spaces and remove the unnecessary spaces. 

Log:
Successful user data would be logged under the following path /var/log/newUsers.log.
