
# Website Name: IMAGE SHARING WEBSITE FOR DIFFERENT PUBLISHERS
# Submitted By: Md. Ashiqur Rahman.

# Requirements:
    1. Create an website having different users of three levels such as Admin, Agent and Member using PHP Yii Framework.
    2. Admin has access to any image files uploaded by anyone from agents or members.
    3. Admin is the parent of the agents.
    4. Agents are the parent of  members and each agent has access to any image files uploaded by himself or any members under him.
    5. Each member has a parent who is agent.
    6. Other than hierarchical structure, any publisher has access to the uploaded image which is shared with him by the uploader.

# Hierarchy:
    1. One admin having all the controls.
    2. Multiple agents whose parent is the admin.
    3. Multiple members whose parent is one agent.

# Database:
    1. Name of the database is: image_share.
    2. It has two tables named as Publisher and Share.
    3. Publisher table contains the data of all the publishers.
    4. Share table contains the data of shared images.


# Functionalities:

    #Publishers:
        1. The system has only one admin and multiple agents under the admin and multiple members under the agents.
        2. No one can be register to be publisher if some already enlisted publisher does not add him.
        3. When the website is accessed at first there is only one option to login.
        4. The logged in publishers have the options to see the list of under publishers, add new publisher, see the list of shared images, share new image.
        5. Admin can add new publisher as either agent or member. If admin adds as agent the parent has to be selected as admin and if adds new as member,
         the respective agent has to be selected as parent.
        6. An agent can add only member whose parent will be that respective agent automatically.
        7. A member can add another member and both of their parent will be the same agent.
        8. Admin can see and manage any profiles.
        9. The agents can see and manage their own profiles and under members.
        9. The members can see only their own profiles.

    #Share Image:
        1. Any publisher can upload any images (JPG,PNG,GIF) in the database.
        2. Any publisher can share the image with any other publisher.
        3. When a member uploads any image, the member himself, the parent agent, the admin and the shared publisher can access the image.
        4. When an agent uploads any image, the agent himself, the admin and the shared publisher can access the image.
        5. When the admin uploads any image, the admin himself and the shared publisher can access the image.
        6. Any accessed image can be seen, deleted or updated by the publisher.
