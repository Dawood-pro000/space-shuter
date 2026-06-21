$downloads = @(
    @{ Url = "https://contribution.usercontent.google.com/download?c=CgthaWRhX2NvZGVmeBJ7Eh1hcHBfY29tcGFuaW9uX2dlbmVyYXRlZF9maWxlcxpaCiVodG1sXzM1YTMyNzI1ZGY1MDQ2NmY5YTBkMzA4NzMyMWNiYWVjEgsSBxC_hdL65hAYAZIBIwoKcHJvamVjdF9pZBIVQhM3MDYzOTQyNDgwMzEzMjMwNzE0&filename=&opi=89354086"; File = "admin-panel.html" },
    @{ Url = "https://contribution.usercontent.google.com/download?c=CgthaWRhX2NvZGVmeBJ7Eh1hcHBfY29tcGFuaW9uX2dlbmVyYXRlZF9maWxlcxpaCiVodG1sX2JiYzA0ZDkyMWJiNjRhYjZhYzhhMjZiNzU1ZGE3ZGM1EgsSBxC_hdL65hAYAZIBIwoKcHJvamVjdF9pZBIVQhM3MDYzOTQyNDgwMzEzMjMwNzE0&filename=&opi=89354086"; File = "sector-details.html" },
    @{ Url = "https://contribution.usercontent.google.com/download?c=CgthaWRhX2NvZGVmeBJ7Eh1hcHBfY29tcGFuaW9uX2dlbmVyYXRlZF9maWxlcxpaCiVodG1sX2RjYzMyMzU4ZDIzNTQ4ZTc4ZGZkY2E0ZDQxY2Q1ZGUwEgsSBxC_hdL65hAYAZIBIwoKcHJvamVjdF9pZBIVQhM3MDYzOTQyNDgwMzEzMjMwNzE0&filename=&opi=89354086"; File = "research-archive.html" },
    @{ Url = "https://contribution.usercontent.google.com/download?c=CgthaWRhX2NvZGVmeBJ7Eh1hcHBfY29tcGFuaW9uX2dlbmVyYXRlZF9maWxlcxpaCiVodG1sXzU0N2Q0OGZlMWFjNjRjMWZiMTkwOWZlZWQxOGRmNDE0EgsSBxC_hdL65hAYAZIBIwoKcHJvamVjdF9pZBIVQhM3MDYzOTQyNDgwMzEzMjMwNzE0&filename=&opi=89354086"; File = "core-discovery.html" },
    @{ Url = "https://contribution.usercontent.google.com/download?c=CgthaWRhX2NvZGVmeBJ7Eh1hcHBfY29tcGFuaW9uX2dlbmVyYXRlZF9maWxlcxpaCiVodG1sX2FjNzBiMThiNzAzOTQxZDBhMTUyNWU0NGM0YzEzYTMyEgsSBxC_hdL65hAYAZIBIwoKcHJvamVjdF9pZBIVQhM3MDYzOTQyNDgwMzEzMjMwNzE0&filename=&opi=89354086"; File = "sign-up.html" },
    @{ Url = "https://contribution.usercontent.google.com/download?c=CgthaWRhX2NvZGVmeBJ7Eh1hcHBfY29tcGFuaW9uX2dlbmVyYXRlZF9maWxlcxpaCiVodG1sXzBkYjU1ZGFiYjYyZTQwZjM5ZTc1M2FhZGY1NzAyY2ZjEgsSBxC_hdL65hAYAZIBIwoKcHJvamVjdF9pZBIVQhM3MDYzOTQyNDgwMzEzMjMwNzE0&filename=&opi=89354086"; File = "login.html" },
    @{ Url = "https://contribution.usercontent.google.com/download?c=CgthaWRhX2NvZGVmeBJ7Eh1hcHBfY29tcGFuaW9uX2dlbmVyYXRlZF9maWxlcxpaCiVodG1sX2Y3ZDQ1ZTQyYTExNDQ4MGY4NWQ5MzdmYjRhOTBlYTc2EgsSBxC_hdL65hAYAZIBIwoKcHJvamVjdF9pZBIVQhM3MDYzOTQyNDgwMzEzMjMwNzE0&filename=&opi=89354086"; File = "article-view.html" },
    @{ Url = "https://contribution.usercontent.google.com/download?c=CgthaWRhX2NvZGVmeBJ7Eh1hcHBfY29tcGFuaW9uX2dlbmVyYXRlZF9maWxlcxpaCiVodG1sXzE4ZTk1MDdmMGNjMDQ5ZjRhNjNiMDBiNmIzMTUxMzljEgsSBxC_hdL65hAYAZIBIwoKcHJvamVjdF9pZBIVQhM3MDYzOTQyNDgwMzEzMjMwNzE0&filename=&opi=89354086"; File = "api-management.html" }
)

foreach ($item in $downloads) {
    Write-Host "Downloading $($item.File)..."
    Invoke-WebRequest -Uri $item.Url -OutFile $item.File
}

Write-Host "All downloads completed."
