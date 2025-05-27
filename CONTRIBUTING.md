# Contributing to Laravel Cookie Consent

Thank you for considering contributing to Laravel Cookie Consent! This document outlines the guidelines for contributing to this project.

## Code of Conduct

In order to ensure that the community is welcoming to all, please review and follow the [Code of Conduct](CODE_OF_CONDUCT.md).

## How Can I Contribute?

### Reporting Bugs

This section guides you through submitting a bug report. Following these guidelines helps maintainers understand your report, reproduce the issue, and find related reports.

- Use a clear and descriptive title for the issue
- Describe the exact steps which reproduce the problem
- Provide specific examples to demonstrate the steps
- Describe the behavior you observed after following the steps
- Explain which behavior you expected to see instead and why
- Include screenshots if possible
- Include details about your environment (OS, PHP version, Laravel version)

### Suggesting Enhancements

This section guides you through submitting an enhancement suggestion, including completely new features and minor improvements to existing functionality.

- Use a clear and descriptive title for the issue
- Provide a step-by-step description of the suggested enhancement
- Describe the current behavior and explain which behavior you expected to see instead
- Explain why this enhancement would be useful to most users
- List some other projects where this enhancement exists, if applicable

### Pull Requests

- Fill in the required template
- Do not include issue numbers in the PR title
- Include screenshots in your pull request whenever possible
- Follow the [PSR-12](https://www.php-fig.org/psr/psr-12/) coding standards
- Include tests for new features
- Document new code using PHPDoc blocks
- End all files with a newline

## Development Setup

1. Fork the repository
2. Clone your fork locally
3. Set up a Laravel test environment
4. Run `composer install`
5. Run the tests with `vendor/bin/phpunit`

## Styleguides

### Git Commit Messages

- Use the present tense ("Add feature" not "Added feature")
- Use the imperative mood ("Move cursor to..." not "Moves cursor to...")
- Limit the first line to 72 characters or less
- Reference issues and pull requests liberally after the first line

### PHP Styleguide

- Follow [PSR-12](https://www.php-fig.org/psr/psr-12/) coding standards
- Use type hints whenever possible
- Add PHPDoc blocks for all classes, methods, and functions
- Use `declare(strict_types=1);` at the top of each file

### Documentation Styleguide

- Use [Markdown](https://daringfireball.net/projects/markdown) for documentation
- Reference methods and classes using backticks: \`CookieConsentService\`
- Use code blocks for code examples

## Additional Notes

### Issue and Pull Request Labels

This project uses labels to help organize and identify issues. Here's what the labels are and what they mean:

- `bug`: Something isn't working
- `documentation`: Improvements or additions to documentation
- `enhancement`: New feature or request
- `good first issue`: Good for newcomers
- `help wanted`: Extra attention is needed
- `invalid`: This doesn't seem right
- `question`: Further information is requested
- `wontfix`: This will not be worked on
