# Agency Manager Plugin

## Overview

The **Agency Manager** plugin for WordPress allows users to manage a custom post type called **Agency**. This plugin includes features for creating and managing agency posts, assigning a specific user role with permissions, and integrating Google Maps to display agency locations.

## Features

### 1. Custom Post Type: Agency

- **Agency Name**: The title of the post, representing the name of the agency.
- **Agency Desc**: The content of the post, describing the agency.
- **Date**: The date when the post was created, which is handled automatically by WordPress.
- **Lat**: Custom field for latitude, indicating the geographical latitude of the agency.
- **Long**: Custom field for longitude, indicating the geographical longitude of the agency.
- **Category**: Standard WordPress post categories that can be assigned to the agency posts.

### 2. User Role: Agency Owner

- **Role Creation**: A new user role named **Agency Owner** is created.
- **Permissions**: Only users with the **Agency Owner** role have the capability to create and manage **Agency** posts.
- **Capabilities**:
  - `edit_agency`: Ability to edit their own agency posts.
  - `publish_agency`: Ability to publish their own agency posts.
  - `delete_agency`: Ability to delete their own agency posts.
  - `read`: Ability to read their own agency posts.

### 3. Detail Page URL Structure

- **URL Format**: Custom URL structure for viewing individual agency posts.
  - Example URLs: 
    - `base_url/agencyowner/post1`
    - `base_url/agencyowner/post2`
- **Base URL**: The base URL for the agency posts is `/agencyowner/`, and each post has a unique identifier (post ID) appended to it.

### 4. REST API Integration

- **Create Agency Post**: A REST API endpoint is available for creating new agency posts. The endpoint allows authenticated **Agency Owner** users to submit data to create new posts.
  - **Endpoint**: `/wp-json/agency/v1/create/`
  - **Method**: `POST`
  - **Required Fields**: 
    - `title` (Agency Name)
    - `content` (Agency Desc)
    - `lat` (Latitude)
    - `lng` (Longitude)
    - `category` (Post Category)

### 5. Google Maps Integration

- **Map Display**: Displays all agency locations on a Google Map.
- **Markers**: Agencies are shown as markers on the map based on their latitude and longitude.
- **Google Maps API**: Requires an API key to use Google Maps for displaying the map and markers.
  - **API Key**: `AGENCY_GOOGLE_MAPS_API_KEY` constant is used to store the API key.

## Implementation

The plugin should be structured to:
1. Define constants for paths and settings.
2. Register the **Agency** custom post type with custom fields.
3. Create the **Agency Owner** user role with specific permissions.
4. Implement a URL rewrite rule for the detail page URLs.
5. Set up a REST API endpoint for creating posts.
6. Integrate Google Maps to display markers for agency locations.

For actual implementation, developers need to create PHP functions and integrate with WordPress hooks and APIs as described.

---

This Markdown file provides a detailed description of the plugin's features and requirements, including how to handle each aspect of the plugin's functionality.
