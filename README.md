
# CRM

A customer relationship management web app that is capable of managing a company's interactions with current and future clients.

## Features

- Login/register user functionality
- Admin can assign projects to managers
- Managers can create teams
- Managers can create projects and assign tasks to agents
- Agents work on tasks assigned to them

## Tech Stack

**Front-end framework:** TailwindCSS

**Back-end framework:** Laravel

## Installation

First, install backend dependencies

```bash
  composer install
```
Generate an .env file and edit it with your own database details

```bash
  cp .env.example .env
```
Then generate keys

```bash
  php artisan key:generate
```
Install frontend dependencies 

```bash
  npm install && npm run dev
```

Run migration code to setup database schema with seeders

```bash
  php artisan migrate --seed
```

You can register as a regular user or login as admin to manage data with the following default credentials 

```bash
  username: admin@admin.com
  password: password
```
