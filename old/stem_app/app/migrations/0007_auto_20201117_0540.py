# Generated by Django 3.1.2 on 2020-11-17 05:40

from django.db import migrations


class Migration(migrations.Migration):

    dependencies = [
        ('app', '0006_tblcallevents_updation_type'),
    ]

    operations = [
        migrations.RenameField(
            model_name='tblcallevents',
            old_name='updation_type',
            new_name='updation_data_type',
        ),
    ]
