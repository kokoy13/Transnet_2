#!/bin/bash

# Path to your Godot project
PROJECT_PATH="/c/xampp/htdocs/test2"
cd $PROJECT_PATH

# Add all changes to git
git add .

# Commit changes with a timestamp message
git commit -m "Auto backup $(date '+%Y-%m-%d %H:%M:%S')"

# Push changes to remote repository
git push origin master

