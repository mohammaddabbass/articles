# Archipedia

## Overview

**Archipedia** is a platform for sharing knowledge in the form of frequently asked questions (FAQs) and their corresponding answers, allowing users to contribute to a community-driven repository of information. The website is based on the concepts of the **Reference Architecture** paper from 2009, focusing on organizing and managing information in a structured and accessible way. Users can write and share their questions and answers, creating a rich knowledge base on various topics.

---

## Hosting Details

- **IP Address:** `51.44.170.152`
- **DNS:** `ec2-51-44-170-152.eu-west-3.compute.amazonaws.com`
- **local API Base URL:** `http://localhost/articles-server/user/v1/`
- **deployed API Base URL:** `http://51.44.170.152/articles-client/`

---

## Branching Strategy & Contribution Workflow

### Branches:

- **`main`** - Stable production-ready code.
- **`others`** - Development branches where new features are tested.

### Commits & Pull Requests:

- Open PRs with proper descriptions and link to the related issue.
- All changes must be reviewed before merging into `main`.

---

## Deployment & Setup Instructions

### Clone the Repository

```sh
git clone https://github.com/mohammaddabbass/articles.git
cd archipedia
