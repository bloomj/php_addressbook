#!/bin/bash

#Read in Git Push parameters
read oldrev newrev refname

#Print out Git Push parameters
echo "Old Revision: $oldrev"
echo "New Revision: $newrev"
echo "Ref Name: $refname"

#Translate ref name to branch name
branch=$(git rev-parse --symbolic --abbrev-ref $refname)

#Switch Git Work Tree
echo "Going to push: $branch"
GIT_WORK_TREE=/var/www
export GIT_WORK_TREE

#Check out the branch to Git Work Tree
git checkout -f $branch

#Notify that it is done
echo "Pushed $branch to /var/www"