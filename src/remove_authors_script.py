import git_filter_repo as repo


def remove_author_commits(commit, metadata):
    if commit.author_name == "Shantannusinh Parmar" and commit.author_email == "shantanu.c.parmar@gmail.com":
        commit.message = "Removed commit by Author Name"
        commit.skip()

repo.RepoFilter(commit_callback=remove_author_commits).run()
