This functions rely on testes_DBCOla database schema, so, in order to funtion in DBCOla the 
database defined in keyspace DBCola must match configuration on testes_DBCola.

All tests were conducted on testes_DBcola, so i redefined the connection to DBCola keyspace (the tables must exist to funtion!)

IMPORTANT : check file paths (top includes and requires files).

Changes on this folder/version:

- Table projects now can hold the same project (key) on diferent repositorys (no updates or duplicate)
- New functions allow to search for partial data on table authors, repositorys and projects
- New funtions to retrieve all details from a project
- The insert script now allow the descrition field of the project


Notes: 
- All scripts have comments so rely on them to check INPUTS and OUTPUT data
- All scripts return data, if no data can be retrieved from tables the return is a string with 'null' word
- Insert script have specifics data input format - READ THEM!

------------------
Examples:

PROJECT DETAILS

Input: Project Name
Scripts involved: search_project_detail.php
		  search_auth_proj.php
                  search_lang_single_pro.php

Function:

search_project_detail(Project name)
Return: description, data_c, data_l, logo (url,if any)

seach_auth_proj(Project name)
Return: author/authors of project (array format)

search_lang_single_pro(Project name)
Return: languages (if defined, array format)

//**************//

Authors (partial search)
Input: String with  letters minimum
Scripts involved : search_part_author.php

Function:

search_part_author("aa")
return: array with author started with "aa"

//**************//

Retrieve projects from author

Input: String author
Scripts involved : search_part_author.php

Function:

search_part_author("aa")
return: array with author started with "aa"