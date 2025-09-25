# 🏷 Git Tags & GitHub Releases Guide

This guide explains how to manage **tags** and **releases** in Git and GitHub. It is designed for beginners and also includes commands to **create, delete, and recreate tags/releases**.

---

## 📌 1. Creating a new commit

Make sure your repository is clean:

```bash
git status
```

Add files and commit:

```bash
git add .
git commit -m "Version 1.0.0 - Initial release"
```

---

## 🏷 2. Creating a Git tag

Tags mark specific points in your Git history. To create an annotated tag:

```bash
git tag -a v1.0.0 -m "Version 1.0.0 - Initial release"
```

* `-a` = annotated tag (recommended)
* `-m` = tag message

---

## 🚀 3. Pushing the tag to GitHub

```bash
git push origin v1.0.0
```

* This uploads the tag to your remote repository.

---

## 🏗 4. Creating a GitHub release via CLI

If you have the **GitHub CLI installed**:

```bash
gh release create v1.0.0 \
  --title "Version 1.0.0" \
  --notes "Initial release of Laravel Database Backup"
```

* This will create a GitHub release linked to your tag.
* You can also add assets/files if needed using `--assets path/to/file`.

---

## ❌ 5. Deleting a tag

### **Delete local tag**

```bash
git tag -d v1.0.0
```

### **Delete remote tag**

```bash
git push origin :refs/tags/v1.0.0
```

---

## ❌ 6. Deleting a GitHub release

### **Using GitHub CLI**

```bash
gh release delete v1.0.0 --yes
```

* Deletes the release associated with the tag.

### **Manual via GitHub website**

1. Go to your repo → **Releases**
2. Find the release → click **Delete**

---

## 🔄 7. Recreating a tag & release

After deleting the old tag/release:

```bash
# Create a new tag locally
git tag -a v1.0.0 -m "Version 1.0.0 - Initial release"

# Push the tag to GitHub
git push origin v1.0.0

# Create a release on GitHub via CLI
gh release create v1.0.0 \
  --title "Version 1.0.0" \
  --notes "Initial release of Laravel Database Backup"
```

---

## ⚠️ Notes

* Always ensure your local branch is up-to-date with `git pull`.
* Use annotated tags (`-a`) for releases.
* Deleting and recreating tags/releases is safe, but **avoid force-pushing tags if others are using them**.

---

## ✅ References

* [Git Tags Documentation](https://git-scm.com/book/en/v2/Git-Basics-Tagging)
* [GitHub Releases Docs](https://docs.github.com/en/repositories/releasing-projects-on-github/about-releases)
* [GitHub CLI](https://cli.github.com/)
